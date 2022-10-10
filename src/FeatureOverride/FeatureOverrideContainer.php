<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

/**
 * @deprecated No longer supported, no replacement is given
 */
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
        if (!$this->has($featureOverrideName)) {
            throw FeatureOverrideContainerException::overrideNotFound($featureOverrideName);
        }
        foreach ($this->overrides as $override) {
            if ($override::getName() !== $featureOverrideName) {
                continue;
            }
            return $override;
        }
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
