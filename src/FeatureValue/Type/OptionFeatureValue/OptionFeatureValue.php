<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue\Type\OptionFeatureValue;

use FeatureKeys\FeatureValue\FeatureValue;
use FeatureKeys\FeatureValue\ValueType;

abstract class OptionFeatureValue extends FeatureValue
{
    private $options;

    protected function __construct($value, array $options, ValueType $type)
    {
        $this->options = $options;
        $this->validateOption($value);
        parent::__construct($value, $type);
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    protected function validateOption($value): void
    {
        if (!\in_array($value, $this->options, true)) {
            $allowedValues = json_encode($this->options);
            throw new \InvalidArgumentException("Value $value does not match any of the allowed values: $allowedValues");
        }
    }
}
