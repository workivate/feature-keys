<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride\Parameters;

use FeatureKeys\FeatureOverride\OverrideParameter;

class TeamId extends OverrideParameter
{
    private const NAME = 'team_id';

    public function __construct(string $value)
    {
        parent::__construct(self::NAME, $value);
    }
}
