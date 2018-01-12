<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

abstract class FeatureAccess
{
    private $enabled;

    private $parent;

    public function __construct(bool $enabled = false)
    {
        $this->enabled = $enabled;
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

    public function __toString(): string
    {
        return (string) $this->enabled;
    }
}
