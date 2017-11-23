<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

class FeatureValueContainerException extends \RuntimeException
{
    public static function valueAlreadySet(string $valueName): self
    {
        return new self("Value $valueName is already set. Resetting is forbidden.", 1);
    }

    public static function valueNotFound(string $valueName): self
    {
        return new self("Value $valueName was not found.", 1);
    }
}
