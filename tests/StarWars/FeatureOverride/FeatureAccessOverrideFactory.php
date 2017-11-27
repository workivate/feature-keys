<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\FeatureOverride\FeatureOverrideFactory;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\CountryAndUniverseOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\CountryOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\GlobalOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\PlayerFromTeamOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\PlayerOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\TeamOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\UniverseOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\CountryId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\PlayerId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\TeamId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\UniverseId;

class FeatureAccessOverrideFactory implements FeatureOverrideFactory
{
    private $playerId;

    private $teamId;

    private $universeId;

    private $countryId;

    public function __construct(PlayerId $playerId, TeamId $teamId, UniverseId $universeId, CountryId $countryId)
    {
        $this->playerId = $playerId;
        $this->teamId = $teamId;
        $this->universeId = $universeId;
        $this->countryId = $countryId;
    }

    public function createFromName(string $overrideName): FeatureOverride
    {
        switch ($overrideName) {
            case GlobalOverride::getName():
                return new GlobalOverride();
            case CountryOverride::getName():
                return new CountryOverride($this->countryId);
            case UniverseOverride::getName():
                return new UniverseOverride($this->universeId);
            case CountryAndUniverseOverride::getName():
                return new CountryAndUniverseOverride($this->countryId, $this->universeId);
            case TeamOverride::getName():
                return new TeamOverride($this->teamId);
            case PlayerFromTeamOverride::getName():
                return new PlayerFromTeamOverride($this->playerId, $this->teamId);
            case PlayerOverride::getName():
                return new PlayerOverride($this->playerId);
            default:
                throw new \RuntimeException("Unknown override $overrideName");
        }
    }
}
