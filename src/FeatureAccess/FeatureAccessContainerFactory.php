<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

final class FeatureAccessContainerFactory
{
    private $config;

    public function __construct(FeatureAccessConfigIterator $config)
    {
        $this->config = $config;
    }

    public function create(): FeatureAccessContainer
    {
        $container = new FeatureAccessContainer();
        foreach ($this->config as $configElement) {
            $className = $configElement->getAccessClassName()->getValue();
            $featureAccess = new $className();
            $parentClassName = $configElement->getAccessParentClassName();
            if ($parentClassName) {
                $featureAccess->setParent($container->get($parentClassName->getValue()::getName()));
            }
            $container->set($featureAccess);
        }
        return $container;
    }
}
