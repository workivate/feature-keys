<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

abstract class FeatureValue
{
    protected $name;

    protected $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    abstract public static function getName(): string;

    abstract public function getValue();
}
