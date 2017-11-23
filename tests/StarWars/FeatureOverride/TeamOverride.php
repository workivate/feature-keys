<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue;

use FeatureKeys\FeatureOverride\FeatureOverride;

class TeamOverride extends FeatureOverride
{
    private const NAME = 'TEAM';

    public function __construct(TeamId $teamId)
    {
        parent::__construct(...[$teamId]);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
