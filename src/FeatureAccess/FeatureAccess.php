<?php
declare(strict_types=1);

/*
At the moment Feature Accesses and Feature Values are defined by names. Because that often isn't descriptive enough, it has been decided that apart from a name, a Feature Key should also be defined by a description.

* TODOs *
* Enforce static method getDescription on abstract FeatureAccess and FeatureValue
* Implement descriptions in the StarWars domain
* Test the descriptions 
*/
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
