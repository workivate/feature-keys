<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

abstract class FeatureValue
{
    protected $value;

    private $type;

    protected function __construct($value, ValueType $type)
    {
        $this->value = $value;
        $this->type = $type;
    }

    public function getType(): ValueType
    {
        return $this->type;
    }

    abstract public static function getName(): string;

    abstract public function getValue();
}
