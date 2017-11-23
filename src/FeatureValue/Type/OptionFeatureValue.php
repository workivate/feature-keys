<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue\Type;

use FeatureKeys\FeatureValue\FeatureValue;

abstract class OptionFeatureValue extends FeatureValue
{
    protected $options;

    protected function __construct($value, array $options)
    {
        $this->options = $options;
        $this->validateValue($value);
        parent::__construct($value);
    }

    public function setValue($value): void
    {
        $this->validateValue($value);
        $this->value = $value;
    }

    private function validateValue($value): void
    {
        if (!in_array($value, $this->options, true)) {
            throw new \InvalidArgumentException("Value $value does not match any of the allowed values.");
        }
    }
}
