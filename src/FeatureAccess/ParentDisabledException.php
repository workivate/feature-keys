<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

class ParentDisabledException extends FeatureAccessContainerException
{
    private $accessName;

    private $parentAccessName;

    public function __construct(string $accessName, string $parentAccessName)
    {
        parent::__construct();
        $this->accessName = $accessName;
        $this->parentAccessName = $parentAccessName;
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
