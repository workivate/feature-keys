<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\FeatureValue\FeatureOverrideContainer;

interface FeatureAccessRepository
{
    public function getForSpecificOverride(FeatureOverride $override): FeatureAccessContainer;

    public function getForOverrides(FeatureOverrideContainer $override): FeatureAccessContainer;
}
