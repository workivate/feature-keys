<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\FeatureOverride;

use FeatureKeys\FeatureOverride\FeatureOverrideContainerHydrator;
use FeatureKeys\Tests\StarWars\FeatureAccessOverrideConfig;
use FeatureKeys\Tests\StarWars\FeatureOverride\FeatureAccessOverrideContainerFactory;
use FeatureKeys\Tests\StarWars\FeatureOverride\FeatureAccessOverrideFactory;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\CountryId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\PlayerId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\TeamId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\UniverseId;
use PHPUnit\Framework\TestCase;

class FeatureOverrideContainerHydratorTest extends TestCase
{
    private $container;

    public function setUp(): void
    {
        $containerFactory = new FeatureAccessOverrideContainerFactory(
            new FeatureAccessOverrideFactory(
                new PlayerId('darkslayer097'),
                new TeamId('GoVirtusPro'),
                new UniverseId('Tatooine'),
                new CountryId('polska')
            )
        );
        $this->container = $containerFactory->createFromConfig(new FeatureAccessOverrideConfig());
    }

    public function testCanUnsetAfterFirstElement(): void
    {
        $firstElement = $this->container->rewind();
        $hydratedContainer = FeatureOverrideContainerHydrator::unsetAfter($this->container, $firstElement::getName());
        self::assertCount(1, $hydratedContainer);
    }

    public function testCanUnsetAfterLastElement(): void
    {
        $lastElement = $this->container->end();
        $hydratedContainer = FeatureOverrideContainerHydrator::unsetAfter($this->container, $lastElement::getName());
        self::assertCount(count($this->container), $hydratedContainer);
    }
}
