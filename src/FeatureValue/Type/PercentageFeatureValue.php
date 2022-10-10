<?php
declare(strict_types=0);

namespace FeatureKeys\FeatureValue\Type;

use FeatureKeys\FeatureValue\FeatureValue;
use FeatureKeys\FeatureValue\ValueType;

/**
 * @deprecated No longer supported, no replacement is given
 */
abstract class PercentageFeatureValue extends FeatureValue
{
    protected function __construct(int $value)
    {
        $this->validateValue($value);
        parent::__construct($value, ValueType::percentage());
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
