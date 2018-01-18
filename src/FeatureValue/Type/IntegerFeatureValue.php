<?php
declare(strict_types=0);

namespace FeatureKeys\FeatureValue\Type;

use FeatureKeys\FeatureValue\FeatureValue;
use FeatureKeys\FeatureValue\ValueType;

abstract class IntegerFeatureValue extends FeatureValue
{
    protected function __construct(int $value)
    {
        parent::__construct($value, ValueType::integer());
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): void
    {
        $this->value = $value;
    }
}
