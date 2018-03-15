<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

class FeatureAccessContainerException extends \RuntimeException
{
    public static function accessAlreadySet(string $accessName): self
    {
        return new self("Access $accessName is already set. Resetting is forbidden.", 2);
    }

    public static function accessNotFound(string $accessName): self
    {
        return new self("Access $accessName was not found.", 3);
    }
}
