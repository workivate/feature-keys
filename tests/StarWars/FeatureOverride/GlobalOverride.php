<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride;

use FeatureKeys\FeatureOverride\FeatureOverride;

class GlobalOverride extends FeatureOverride
{
    private const NAME = 'GLOBAL';

    public function __construct()
    {
        parent::__construct(...[]);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
