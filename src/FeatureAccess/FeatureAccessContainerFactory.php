<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

class FeatureAccessContainerFactory
{
    public function __invoke(FeatureAccessConfigIterator $config): FeatureAccessContainer
    {
        $container = new FeatureAccessContainer();
        foreach ($config as $configElement) {
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
