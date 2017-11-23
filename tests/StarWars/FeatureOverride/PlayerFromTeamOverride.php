<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\PlayerId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\TeamId;

class PlayerFromTeamOverride extends FeatureOverride
{
    private const NAME = 'PLAYER_FROM_TEAM';

    public function __construct(PlayerId $playerId, TeamId $teamId)
    {
        parent::__construct(...[$playerId, $teamId]);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
