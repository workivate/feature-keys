<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue\Type;

use FeatureKeys\FeatureValue\FeatureValue;

abstract class PercentageFeatureValue extends FeatureValue
{
    protected function __construct(int $value)
    {
        $this->validateValue($value);
        parent::__construct($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(int $value): void
    {
        $this->validateValue($value);
        $this->value = $value;
    }

    private function validateValue(int $value): void
    {
        if ($value < 0 || $value > 100) {
            throw new \OutOfRangeException();
        }
    }
}
