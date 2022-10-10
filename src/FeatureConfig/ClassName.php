<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureConfig;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class ClassName
{
    private $value;

    public function __construct(string $value)
    {
        self::validateClassExists($value);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private static function validateClassExists(string $className): void
    {
        if (!class_exists($className)) {
            throw new \RuntimeException("Class $className does not exist.");
        }
    }
}
