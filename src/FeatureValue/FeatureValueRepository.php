<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

use FeatureKeys\FeatureOverride\FeatureOverride;

interface FeatureValueRepository
{
    public function getForSpecificOverride(FeatureOverride $override): FeatureValueContainer;

    public function getForOverrides(FeatureOverrideContainer $override): FeatureValueContainer;
}
