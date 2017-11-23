<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars;

use FeatureKeys\FeatureConfig\ClassName;
use FeatureKeys\FeatureConfig\FeatureClassNameIterator;
use FeatureKeys\Tests\StarWars\FeatureAccess\Sith\BaneAccess;
use FeatureKeys\Tests\StarWars\FeatureValue\CountryAndUniverseOverride;
use FeatureKeys\Tests\StarWars\FeatureValue\CountryOverride;
use FeatureKeys\Tests\StarWars\FeatureValue\GlobalOverride;
use FeatureKeys\Tests\StarWars\FeatureValue\PlayerFromTeamOverride;
use FeatureKeys\Tests\StarWars\FeatureValue\PlayerOverride;
use FeatureKeys\Tests\StarWars\FeatureValue\TeamOverride;
use FeatureKeys\Tests\StarWars\FeatureValue\UniverseOverride;

class FeatureAccessOverrideConfig extends FeatureClassNameIterator
{
    public function __construct()
    {
        $this->add(new ClassName(GlobalOverride::class));
        $this->add(new ClassName(CountryOverride::class));
        $this->add(new ClassName(UniverseOverride::class));
        $this->add(new ClassName(CountryAndUniverseOverride::class));
        $this->add(new ClassName(TeamOverride::class));
        $this->add(new ClassName(PlayerFromTeamOverride::class));
        $this->add(new ClassName(PlayerOverride::class));
    }
}
