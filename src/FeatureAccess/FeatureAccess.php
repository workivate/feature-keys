<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

abstract class FeatureAccess
{
    private $enabled;

    private $parent;

    private $overridden;

    public function __construct()
    {
        $this->enabled = false;
        $this->overridden = false;

    }

    abstract public static function getName(): string;

    abstract public static function getDescription(): string;

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function isDisabled(): bool
    {
        return !$this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->overridden = true;
        $this->enabled = $enabled;
    }

    public function setParent(self $parent): void
    {
        $this->parent = $parent;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function isOverridden(): bool
    {
        return $this->overridden;
    }

    public function __toString(): string
    {
        return (string) $this->enabled;
    }
}
