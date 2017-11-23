<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue\Type;

use FeatureKeys\FeatureValue\FeatureValue;

abstract class IntegerFeatureValue extends FeatureValue
{
    protected function __construct(int $value)
    {
        parent::__construct($value);
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
