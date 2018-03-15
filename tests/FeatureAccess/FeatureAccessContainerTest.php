<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\FeatureAccess;

use FeatureKeys\FeatureAccess\FeatureAccessContainer;
use FeatureKeys\FeatureAccess\FeatureAccessContainerException;
use FeatureKeys\FeatureAccess\ParentDisabledException;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\JediAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\ObiWanAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\QuiGonAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\YodaAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith\PlagueisAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith\SithAccess;
use PHPUnit\Framework\TestCase;

class FeatureAccessContainerTest extends TestCase
{
    public function testCanInstantiateEmpty(): void
    {
        $container = new FeatureAccessContainer(...[]);
        self::assertInstanceOf(FeatureAccessContainer::class, $container);
    }

    public function testCanInstantiateWithOneElement(): void
    {
        $container = new FeatureAccessContainer(...[new JediAccess()]);
        self::assertInstanceOf(FeatureAccessContainer::class, $container);
    }

    public function testCanSetAndGetElements(): void
    {
        $sithAccess = new SithAccess();
        $container = new FeatureAccessContainer(...[]);
        $container->set($sithAccess);
        self::assertSame($sithAccess, $container->get(SithAccess::getName()));
    }

    public function testCannotSetSameAccessTwice(): void
    {
        $jediAccess = new JediAccess();
        $container = new FeatureAccessContainer(...[$jediAccess]);

        $expectedException = FeatureAccessContainerException::accessAlreadySet($jediAccess::getName());
        $this->expectException(get_class($expectedException));
        $this->expectExceptionCode($expectedException->getCode());
        $this->expectExceptionMessage($expectedException->getMessage());

        $container->set($jediAccess);
    }

    public function testCannotGetUnsetAccess(): void
    {
        $container = new FeatureAccessContainer(...[]);

        $expectedException = FeatureAccessContainerException::accessNotFound(YodaAccess::getName());
        $this->expectException(get_class($expectedException));
        $this->expectExceptionCode($expectedException->getCode());
        $this->expectExceptionMessage($expectedException->getMessage());

        $container->get(YodaAccess::getName());
    }

    public function testCanValidateItself(): void
    {
        $sithAccess = new SithAccess(false);
        $plagueisAccess = new PlagueisAccess(true);
        $plagueisAccess->setParent($sithAccess);
        $invalidAccessSet = [
            $sithAccess,
            $plagueisAccess,
        ];

        $expectedException = ParentDisabledException::create(
            $plagueisAccess::getName(),
            $sithAccess::getName()
        );
        $this->expectException(get_class($expectedException));
        $this->expectExceptionCode($expectedException->getCode());
        $this->expectExceptionMessage($expectedException->getMessage());

        new FeatureAccessContainer(...$invalidAccessSet);
    }

    public function testCanBeOverridden(): void
    {
        $container = new FeatureAccessContainer(...[
            new JediAccess(true),
            new YodaAccess(true),
            new QuiGonAccess(false),
        ]);

        $overridingContainer = new FeatureAccessContainer(...[
            new QuiGonAccess(true),
            new ObiWanAccess(false),
        ]);

        $container->override($overridingContainer);

        self::assertTrue($container->get(JediAccess::getName())->isEnabled());
        self::assertTrue($container->get(YodaAccess::getName())->isEnabled());
        self::assertTrue($container->get(QuiGonAccess::getName())->isEnabled());
        self::assertTrue($container->get(ObiWanAccess::getName())->isDisabled());
        self::assertCount(4, $container->getAll());
    }
}
