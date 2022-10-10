<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

/**
 * @deprecated No longer supported, no replacement is given
 */
interface FeatureOverrideFactory
{
    public function createFromName(string $overrideName): FeatureOverride;
}
