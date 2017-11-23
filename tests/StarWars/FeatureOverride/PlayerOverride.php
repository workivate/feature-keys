<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue;

use FeatureKeys\FeatureOverride\FeatureOverride;

class PlayerOverride extends FeatureOverride
{
    private const NAME = 'PLAYER';

    public function __construct(PlayerId $playerId)
    {
        parent::__construct(...[$playerId]);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
