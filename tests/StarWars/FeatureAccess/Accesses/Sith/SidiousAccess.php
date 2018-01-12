<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith;

use FeatureKeys\FeatureAccess\FeatureAccess;

class SidiousAccess extends FeatureAccess
{
    private const NAME = 'SIDIOUS';

    private const DESCRIPTION = 'Defines access to Sidious\' features.';

    public static function getName(): string
    {
        return self::NAME;
    }

    public static function getDescription(): string
    {
        return self ::DESCRIPTION;
    }
}
