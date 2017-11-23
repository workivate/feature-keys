<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

use FeatureKeys\FeatureOverride\FeatureOverride;

class FeatureOverrideContainer
{
    private $overrides = [];

    public function __construct(FeatureOverride ...$overrides)
    {
        foreach ($overrides as $override) {
            $this->set($override);
        }
    }

    public function set(FeatureOverride $featureOverride): void
    {
        if ($this->has($featureOverride::getName())) {
            throw FeatureOverrideContainerException::overrideAlreadySet($featureOverride::getName());
        }
        $this->overrides[$featureOverride::getName()] = $featureOverride;
    }

    public function get(string $featureOverrideName): FeatureOverride
    {
        if (!$this->has($featureOverrideName)) {
            throw FeatureOverrideContainerException::overrideNotFound($featureOverrideName);
        }
        return $this->overrides[$featureOverrideName];
    }

    public function has(string $featureOverrideName): bool
    {
        return isset($this->overrides[$featureOverrideName]);
    }

    public function serialize(): array
    {
        return $this->overrides;
    }
}
