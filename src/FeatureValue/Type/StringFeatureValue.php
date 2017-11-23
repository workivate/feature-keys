<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue\Type;

use FeatureKeys\FeatureValue\FeatureValue;

abstract class StringFeatureValue extends FeatureValue
{
    protected function __construct(string $value)
    {
        parent::__construct($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
