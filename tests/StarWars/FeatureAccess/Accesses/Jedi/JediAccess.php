<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi;

use FeatureKeys\FeatureAccess\FeatureAccess;

class JediAccess extends FeatureAccess
{
    private const NAME = 'JEDI';

    public static function getName(): string
    {
        return self::NAME;
    }
}
