<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Sith;

use FeatureKeys\FeatureAccess\FeatureAccess;

class SithAccess extends FeatureAccess
{
    private const NAME = 'SITH';

    public static function getName(): string
    {
        return self::NAME;
    }
}
