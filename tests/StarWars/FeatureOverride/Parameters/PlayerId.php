<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue;

use FeatureKeys\FeatureOverride\OverrideParameter;

class PlayerId extends OverrideParameter
{
    private const NAME = 'player_id';

    public function __construct(string $value)
    {
        parent::__construct(self::NAME, $value);
    }
}
