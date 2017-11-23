<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

interface FeatureOverrideFactory
{
    public function createFromName(string $overrideName): FeatureOverride;
}
