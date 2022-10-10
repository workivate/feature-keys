<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\FeatureOverride\FeatureOverrideContainer;

/**
 * @deprecated No longer supported, no replacement is given
 */
interface FeatureAccessRepository
{
    public function getForSpecificOverride(FeatureOverride $featureOverride, bool $includeUnset = false): FeatureAccessContainer;

    public function getForOverrides(FeatureOverrideContainer $featureOverrideContainer, bool $includeUnset = false): FeatureAccessContainer;

    public function save(FeatureAccess $featureAccess, FeatureOverride $featureOverride): void;
}
