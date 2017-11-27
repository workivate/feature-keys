<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi;

use FeatureKeys\FeatureAccess\FeatureAccess;

class YodaAccess extends FeatureAccess
{
    private const NAME = 'YODA';

    public static function getName(): string
    {
        return self::NAME;
    }
}
