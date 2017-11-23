<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

class FeatureOverrideContainerHydrator
{
    public static function unsetAfter(FeatureOverrideContainer $container, string $lastOverrideName): FeatureOverrideContainer
    {
        $hydratedContainer = new FeatureOverrideContainer(...[]);
        foreach ($container->serialize() as $override) {
            $hydratedContainer->set($override);
            if ($override::getName() === $lastOverrideName) {
                return $hydratedContainer;
            }
        }
    }
}
