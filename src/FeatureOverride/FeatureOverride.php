<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

abstract class FeatureOverride
{
    private $parameters;

    protected function __construct(OverrideParameter ...$parameters)
    {
        $this->parameters = $parameters;
    }

    abstract public static function getName(): string;

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
