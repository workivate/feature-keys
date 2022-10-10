<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\SetValue;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\FeatureValue\FeatureValue;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class SetValueCommand
{
    private $value;

    private $override;

    public function __construct(FeatureValue $value, FeatureOverride $override)
    {
        $this->value = $value;
        $this->override = $override;
    }

    public function getValue(): FeatureValue
    {
        return $this->value;
    }

    public function getOverride(): FeatureOverride
    {
        return $this->override;
    }
}
