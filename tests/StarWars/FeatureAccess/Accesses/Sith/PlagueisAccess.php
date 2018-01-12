<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith;

use FeatureKeys\FeatureAccess\FeatureAccess;

class PlagueisAccess extends FeatureAccess
{
    private const NAME = 'PLAGUEIS';

    private const DESCRIPTION = 'Defines access to Plagueis\' features.';

    public static function getName(): string
    {
        return self::NAME;
    }

    public static function getDescription(): string
    {
        return self ::DESCRIPTION;
    }
}
