<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\GetValues;

use FeatureKeys\FeatureOverride\FeatureOverrideContainer;

/**
 * @deprecated No longer supported, no replacement is given
 */
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
