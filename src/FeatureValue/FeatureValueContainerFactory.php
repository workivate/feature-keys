<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

use FeatureKeys\FeatureConfig\FeatureClassNameIterator;

class FeatureValueContainerFactory
{
    public function __invoke(FeatureClassNameIterator $config): FeatureValueContainer
    {
        $container = new FeatureValueContainer();
        foreach ($config as $configElement) {
            $className = $configElement->getValue();
            $container->set(new $className());
        }
        return $container;
    }
}
