<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Sith;

use FeatureKeys\FeatureAccess\FeatureAccess;

class VaderAccess extends FeatureAccess
{
    private const NAME = 'VADER';

    public static function getName(): string
    {
        return self::NAME;
    }
}
