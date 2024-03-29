<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

/**
 * @deprecated No longer supported, no replacement is given
 */
class ValueType
{
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public static function integerOption(): self
    {
        return new self('integer option');
    }

    public static function stringOption(): self
    {
        return new self('string option');
    }

    public static function float(): self
    {
        return new self('float');
    }

    public static function integer(): self
    {
        return new self('integer');
    }

    public static function boolean(): self
    {
        return new self('boolean');
    }

    public static function percentage(): self
    {
        return new self('percentage');
    }

    public static function string(): self
    {
        return new self('string');
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function equals(self $valueType): bool
    {
        return $this->type === $valueType->getType();
    }

    public function __toString(): string
    {
        return $this->type;
    }
}
