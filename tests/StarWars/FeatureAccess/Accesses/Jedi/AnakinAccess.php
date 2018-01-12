<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi;

use FeatureKeys\FeatureAccess\FeatureAccess;

class AnakinAccess extends FeatureAccess
{
    private const NAME = 'ANAKIN';

    private const DESCRIPTION = "Defines access to Anakin\'s features.";

    public static function getName(): string
    {
        return self::NAME;
    }

    public static function getDescription(): string
    {
        return self ::DESCRIPTION;
    }
}
