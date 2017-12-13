<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\FeatureOverride\FeatureOverrideContainer;

interface FeatureValueRepository
{
    public function getForSpecificOverride(FeatureOverride $featureOverride, bool $includeUnset = false): FeatureValueContainer;

    public function getForOverrides(FeatureOverrideContainer $featureOverrideContainer, bool $includeUnset = false): FeatureValueContainer;

    public function save(FeatureValue $featureValue, FeatureOverride $featureOverride): void;
}
