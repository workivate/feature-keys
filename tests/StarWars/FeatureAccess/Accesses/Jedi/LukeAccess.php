<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi;

use FeatureKeys\FeatureAccess\FeatureAccess;

class LukeAccess extends FeatureAccess
{
    private const NAME = 'LUKE';

    private const DESCRIPTION = 'Defines access to Luke Skywalker\'s  features.';

    public static function getName(): string
    {
        return self::NAME;
    }

    public static function getDescription(): string
    {
        return self ::DESCRIPTION;
    }
}
