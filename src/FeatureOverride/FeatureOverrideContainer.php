<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

final class FeatureOverrideContainer
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
        $this->overrides[] = $featureOverride;
    }

    public function get(string $featureOverrideName): FeatureOverride
    {
        foreach ($this->overrides as $override) {
            if ($override::getName() !== $featureOverrideName) {
                continue;
            }
            return $override;
        }
        throw FeatureOverrideContainerException::overrideNotFound($featureOverrideName);
    }

    public function has(string $featureOverrideName): bool
    {
        foreach ($this->overrides as $override) {
            if ($override::getName() === $featureOverrideName) {
                return true;
            }
        }
        return false;
    }

    public function serialize(): array
    {
        return $this->overrides;
    }
}
