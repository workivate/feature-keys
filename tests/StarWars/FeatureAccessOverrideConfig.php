<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars;

use FeatureKeys\FeatureConfig\ClassName;
use FeatureKeys\FeatureConfig\FeatureClassNameIterator;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\CountryAndUniverseOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\CountryOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\GlobalOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\PlayerFromTeamOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\PlayerOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\TeamOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\UniverseOverride;

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
