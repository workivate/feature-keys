<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

final class FeatureValueContainer
{
    private $values = [];

    public function __construct(FeatureValue ...$values)
    {
        foreach ($values as $value) {
            $this->set($value);
        }
    }

    public function set(FeatureValue $featureValue): void
    {
        if ($this->has($featureValue::getName())) {
            throw FeatureValueContainerException::valueAlreadySet($featureValue::getName());
        }
        $this->values[$featureValue::getName()] = $featureValue;
    }

    public function get(string $featureValueName): FeatureValue
    {
        if (!$this->has($featureValueName)) {
            throw FeatureValueContainerException::valueNotFound($featureValueName);
        }
        return $this->values[$featureValueName];
    }

    public function has(string $FeatureValueName): bool
    {
        return isset($this->values[$FeatureValueName]);
    }

    public function getAll(): array
    {
        return $this->values;
    }
}
