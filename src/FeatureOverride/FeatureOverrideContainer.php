<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

final class FeatureOverrideContainer implements \Iterator, \Countable
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

    public function current()
    {
       return current($this->overrides);
    }

    public function next()
    {
        return next($this->overrides);
    }

    public function key()
    {
        return key($this->overrides);
    }

    public function valid()
    {
        return $this->key() !== null;
    }

    public function rewind()
    {
        return reset($this->overrides);
    }

    public function end()
    {
        return end($this->overrides);
    }

    public function count()
    {
        return count($this->overrides);
    }
}
