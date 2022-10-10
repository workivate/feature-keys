<?php
declare(strict_types=0);

namespace FeatureKeys\FeatureValue\Type;

use FeatureKeys\FeatureValue\FeatureValue;
use FeatureKeys\FeatureValue\ValueType;

/**
 * @deprecated No longer supported, no replacement is given
 */
abstract class FloatFeatureValue extends FeatureValue
{
    protected function __construct(float $value)
    {
        parent::__construct($value, ValueType::float());
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }
}
