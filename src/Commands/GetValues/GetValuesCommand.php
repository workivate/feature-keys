<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\GetValues;

use FeatureKeys\FeatureOverride\FeatureOverrideContainer;

final class GetValuesCommand
{
    private $overrides;

    public function __construct(FeatureOverrideContainer $overrides)
    {
        $this->overrides = $overrides;
    }

    public function getOverrides(): FeatureOverrideContainer
    {
        return $this->overrides;
    }
}
