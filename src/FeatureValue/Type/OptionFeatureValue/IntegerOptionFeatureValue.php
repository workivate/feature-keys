<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue\Type\OptionFeatureValue;

use FeatureKeys\FeatureValue\ValueType;

abstract class IntegerOptionFeatureValue extends OptionFeatureValue
{
    protected function __construct(int $value, array $options)
    {
        parent::__construct($value, $options, ValueType::stringOption());
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): void
    {
        $this->validateOption($value);
        $this->value = $value;
    }
}
