<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

/**
 * @deprecated No longer supported, no replacement is given
 */
class ParentDisabledException extends FeatureAccessContainerException
{
    private $accessName;

    private $parentAccessName;

    public function __construct(string $accessName, string $parentAccessName)
    {
        parent::__construct("Access $accessName cannot be enabled if $parentAccessName is disabled.");
        $this->accessName = $accessName;
        $this->parentAccessName = $parentAccessName;
    }

    public static function create(string $accessName, string $parentAccessName): self
    {
        return new self($accessName, $parentAccessName);
    }

    public function getAccessName(): string
    {
        return $this->accessName;
    }

    public function getParentAccessName(): string
    {
        return $this->parentAccessName;
    }
}
