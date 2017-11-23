<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\FeatureAccess;

use FeatureKeys\FeatureValue\FeatureValueContainer;
use FeatureKeys\FeatureValue\FeatureValueContainerException;
use FeatureKeys\Tests\StarWars\FeatureValue\JediName;
use FeatureKeys\Tests\StarWars\FeatureValue\JediTrainingLevel;
use FeatureKeys\Tests\StarWars\FeatureValue\LightSaberColor;
use FeatureKeys\Tests\StarWars\FeatureValue\SithTrainingLevel;
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
}
