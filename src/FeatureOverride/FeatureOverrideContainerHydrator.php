<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

final class FeatureOverrideContainerHydrator
{
    public static function unsetAfter(FeatureOverrideContainer $container, string $lastOverrideName): FeatureOverrideContainer
    {
        $hydratedContainer = new FeatureOverrideContainer(...[]);
        foreach ($container as $override) {
            $hydratedContainer->set($override);
            if ($override::getName() === $lastOverrideName) {
                return $hydratedContainer;
            }
        }
    }
}
