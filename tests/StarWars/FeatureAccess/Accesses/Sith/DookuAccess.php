<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith;

use FeatureKeys\FeatureAccess\FeatureAccess;

class DookuAccess extends FeatureAccess
{
    private const NAME = 'DOOKU';

    public static function getName(): string
    {
        return self::NAME;
    }
}
