<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\FeatureOverride;

use FeatureKeys\FeatureOverride\FeatureOverrideContainer;
use FeatureKeys\FeatureOverride\FeatureOverrideContainerException;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\CountryOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\PlayerFromTeamOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\PlayerOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\UniverseOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\CountryId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\PlayerId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\UniverseId;
use PHPUnit\Framework\TestCase;

class FeatureOverrideContainerTest extends TestCase
{
    public function testCanInstantiateEmpty(): void
    {
        $container = new FeatureOverrideContainer(...[]);
        self::assertInstanceOf(FeatureOverrideContainer::class, $container);
    }

    public function testCanInstantiateWithOneElement(): void
    {
        $playerOverride = new PlayerOverride(new PlayerId('a player'));
        $container = new FeatureOverrideContainer(...[$playerOverride]);
        self::assertInstanceOf(FeatureOverrideContainer::class, $container);
    }

    public function testCanSetAndGetElements(): void
    {
        $countryOverride = new CountryOverride(new CountryId('a country'));
        $container = new FeatureOverrideContainer(...[]);
        $container->set($countryOverride);
        self::assertSame($countryOverride, $container->get(CountryOverride::getName()));
    }

    public function testCannotSetSameOverrideTwice(): void
    {
        $universeOverride = new UniverseOverride(new UniverseId('a universe'));
        $container = new FeatureOverrideContainer(...[$universeOverride]);

        $expectedException = FeatureOverrideContainerException::overrideAlreadySet($universeOverride::getName());
        $this->expectException(get_class($expectedException));
        $this->expectExceptionCode($expectedException->getCode());
        $this->expectExceptionMessage($expectedException->getMessage());

        $container->set($universeOverride);
    }

    public function testCannotGetUnsetOverride(): void
    {
        $container = new FeatureOverrideContainer(...[]);

        $expectedException = FeatureOverrideContainerException::overrideNotFound(PlayerFromTeamOverride::getName());
        $this->expectException(get_class($expectedException));
        $this->expectExceptionCode($expectedException->getCode());
        $this->expectExceptionMessage($expectedException->getMessage());

        $container->get(PlayerFromTeamOverride::getName());
    }
}
