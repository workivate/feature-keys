<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

final class OverrideType
{
    private $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function access(): self
    {
        return new self('ACCESS');
    }

    public static function value(): self
    {
        return new self('VALUE');
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
