<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class FeatureOverrideContainerHydrator
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
