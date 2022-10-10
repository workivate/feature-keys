<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

/**
 * @deprecated No longer supported, no replacement is given
 */
abstract class OverrideParameter
{
    private $name;

    private $value;

    protected function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
