<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

use FeatureKeys\FeatureConfig\ClassName;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class FeatureAccessConfigElement
{
    private $accessClassName;

    private $accessParentClassName;

    public function __construct(ClassName $accessClassName, ?ClassName $accessParentClassName)
    {
        $this->accessClassName = $accessClassName;

        if ($accessParentClassName) {
            $this->accessParentClassName = $accessParentClassName;
        }
    }

    public function getAccessClassName(): ClassName
    {
        return $this->accessClassName;
    }

    public function getAccessParentClassName(): ?ClassName
    {
        return $this->accessParentClassName;
    }
}
