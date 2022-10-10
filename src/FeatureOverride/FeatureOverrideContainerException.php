<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureOverride;

/**
 * @deprecated No longer supported, no replacement is given
 */
class FeatureOverrideContainerException extends \RuntimeException
{
    public static function overrideAlreadySet(string $overrideName): self
    {
        return new self("Override $overrideName is already set. Resetting is forbidden.", 1);
    }

    public static function overrideNotFound(string $overrideName): self
    {
        return new self("Override $overrideName was not found.", 2);
    }
}
