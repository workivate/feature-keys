<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride;

use FeatureKeys\FeatureOverride\FeatureOverrideContainer;
use FeatureKeys\Tests\StarWars\FeatureValueOverrideConfig;

class FeatureValueOverrideContainerFactory
{
    private $overrideFactory;

    public function __construct(FeatureValueOverrideFactory $overrideFactory)
    {
        $this->overrideFactory = $overrideFactory;
    }

    public function createFromConfig(FeatureValueOverrideConfig $config): FeatureOverrideContainer
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
