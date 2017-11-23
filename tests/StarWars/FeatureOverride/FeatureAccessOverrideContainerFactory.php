<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride;

use FeatureKeys\FeatureOverride\FeatureOverrideContainer;
use FeatureKeys\Tests\StarWars\FeatureAccessOverrideConfig;

class FeatureAccessOverrideContainerFactory
{
    private $overrideFactory;

    public function __construct(FeatureAccessOverrideFactory $overrideFactory)
    {
        $this->overrideFactory = $overrideFactory;
    }

    public function createFromConfig(FeatureAccessOverrideConfig $config): FeatureOverrideContainer
    {
        $container = new FeatureOverrideContainer(...[]);
        foreach ($config as $configElement) {
            $overrideClassName = $configElement->getValue();
            $override = $this->overrideFactory->createFromName($overrideClassName::getName());
            $container->set($override);
        }
        return $container;
    }
}
