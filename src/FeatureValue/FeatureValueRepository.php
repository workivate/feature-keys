<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\FeatureOverride\FeatureOverrideContainer;

interface FeatureValueRepository
{
    public function getForSpecificOverride(FeatureOverride $featureOverride): FeatureValueContainer;

    public function getForOverrides(FeatureOverrideContainer $featureOverrideContainer): FeatureValueContainer;

    public function save(FeatureValue $featureValue, FeatureOverride $featureOverride): void;
}
