<?php
declare(strict_types=0);

namespace FeatureKeys\FeatureValue\Type;

use FeatureKeys\FeatureValue\FeatureValue;
use FeatureKeys\FeatureValue\ValueType;

abstract class OptionFeatureValue extends FeatureValue
{
    private $options;

    protected function __construct($value, array $options)
    {
        $this->options = $options;
        $this->validateValue($value);
        parent::__construct($value, ValueType::option());
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setValue($value): void
    {
        $this->validateValue($value);
        $this->value = $value;
    }

    private function validateValue($value): void
    {
        if (!in_array($value, $this->options, true)) {
            $featureValueName = self::getName();
            throw new \InvalidArgumentException("$featureValueName: Value $value does not match any of the allowed values.");
        }
    }
}
