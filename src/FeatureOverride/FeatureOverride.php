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

    public function getParameterValue(string $parameterName): ?string
    {
        foreach ($this->parameters as $parameter) {
            if ($parameter->getName() === $parameterName) {
                return $parameter->getValue();
            }
        }
        return null;
    }
}
