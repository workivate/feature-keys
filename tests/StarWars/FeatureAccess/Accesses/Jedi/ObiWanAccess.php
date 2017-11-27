<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi;

use FeatureKeys\FeatureAccess\FeatureAccess;

class ObiWanAccess extends FeatureAccess
{
    private const NAME = 'OBI_WAN';

    public static function getName(): string
    {
        return self::NAME;
    }
}
