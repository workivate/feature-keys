<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Jedi;

use FeatureKeys\FeatureAccess\FeatureAccess;

class LukeAccess extends FeatureAccess
{
    private const NAME = 'LUKE';

    public static function getName(): string
    {
        return self::NAME;
    }
}
