<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi;

use FeatureKeys\FeatureAccess\FeatureAccess;

class QuiGonAccess extends FeatureAccess
{
    private const NAME = 'QUI_GON';

    public static function getName(): string
    {
        return self::NAME;
    }
}
