<?php
declare(strict_types=0);

namespace FeatureKeys\FeatureValue\Type;

use FeatureKeys\FeatureValue\FeatureValue;
use FeatureKeys\FeatureValue\ValueType;

/**
 * @deprecated No longer supported, no replacement is given
 */
abstract class BooleanFeatureValue extends FeatureValue
{
    protected function __construct(bool $value)
    {
        parent::__construct($value, ValueType::boolean());
    }

    public function getValue(): bool
    {
        return $this->value;
    }

    public function setValue(bool $value): void
    {
        $this->value = $value;
    }
}
