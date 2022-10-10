<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue\Type\OptionFeatureValue;

use FeatureKeys\FeatureValue\ValueType;

/**
 * @deprecated No longer supported, no replacement is given
 */
abstract class StringOptionFeatureValue extends OptionFeatureValue
{
    protected function __construct(string $value, array $options)
    {
        parent::__construct($value, $options, ValueType::stringOption());
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->validateOption($value);
        $this->value = $value;
    }
}
