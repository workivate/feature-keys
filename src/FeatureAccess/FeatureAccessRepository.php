<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\FeatureOverride\FeatureOverrideContainer;

interface FeatureAccessRepository
{
    public function getForSpecificOverride(FeatureOverride $featureOverride): FeatureAccessContainer;

    public function getForOverrides(FeatureOverrideContainer $featureOverrideContainer): FeatureAccessContainer;

    public function save(FeatureAccess $featureAccess, FeatureOverride $featureOverride): void;
}
