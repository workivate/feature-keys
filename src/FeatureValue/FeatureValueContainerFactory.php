<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

use FeatureKeys\FeatureConfig\FeatureClassNameIterator;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class FeatureValueContainerFactory
{
    private $config;

    public function __construct(FeatureClassNameIterator $config)
    {
        $this->config = $config;
    }

    public function create(): FeatureValueContainer
    {
        $container = new FeatureValueContainer();
        foreach ($this->config as $configElement) {
            $className = $configElement->getValue();
            $container->set(new $className());
        }
        return $container;
    }
}
