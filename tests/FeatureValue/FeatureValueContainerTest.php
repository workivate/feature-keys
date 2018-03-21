<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\FeatureAccess;

use FeatureKeys\FeatureValue\FeatureValueContainer;
use FeatureKeys\FeatureValue\FeatureValueContainerException;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\DrawnToTheDarkSide;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\JediName;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\JediTrainingLevel;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\LightSaberColor;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\SithTrainingLevel;
use PHPUnit\Framework\TestCase;

class FeatureValueContainerTest extends TestCase
{
    public function testCanInstantiateEmpty(): void
    {
        $container = new FeatureValueContainer(...[]);
        self::assertInstanceOf(FeatureValueContainer::class, $container);
    }

    public function testCanInstantiateWithOneElement(): void
    {
        $container = new FeatureValueContainer(...[new LightSaberColor('green')]);
        self::assertInstanceOf(FeatureValueContainer::class, $container);
    }

    public function testCanSetAndGetElements(): void
    {
        $jediName = new JediName('Khromi Corliss');
        $container = new FeatureValueContainer(...[]);
        $container->set($jediName);
        self::assertSame($jediName, $container->get(JediName::getName()));
    }

    public function testCannotSetSameValueTwice(): void
    {
        $jediLevel = new JediTrainingLevel('master');
        $container = new FeatureValueContainer(...[$jediLevel]);

        $expectedException = FeatureValueContainerException::valueAlreadySet($jediLevel::getName());
        $this->expectException(get_class($expectedException));
        $this->expectExceptionCode($expectedException->getCode());
        $this->expectExceptionMessage($expectedException->getMessage());

        $container->set($jediLevel);
    }

    public function testCannotGetUnsetValue(): void
    {
        $container = new FeatureValueContainer(...[]);

        $expectedException = FeatureValueContainerException::valueNotFound(SithTrainingLevel::getName());
        $this->expectException(get_class($expectedException));
        $this->expectExceptionCode($expectedException->getCode());
        $this->expectExceptionMessage($expectedException->getMessage());

        $container->get(SithTrainingLevel::getName());
    }

    public function testCanBeOverridden(): void
    {
        $container = new FeatureValueContainer(...[
            new LightSaberColor('blue'),
            new DrawnToTheDarkSide(false),
        ]);

        $overridingContainer = new FeatureValueContainer(...[
            new LightSaberColor('red'),
            new SithTrainingLevel('adept'),
        ]);

        $container->override($overridingContainer);

        self::assertSame('red', $container->get(LightSaberColor::getName())->getValue());
        self::assertFalse($container->get(DrawnToTheDarkSide::getName())->getValue());
        self::assertSame('adept', $container->get(SithTrainingLevel::getName())->getValue());
        self::assertCount(3, $container);
    }
}
