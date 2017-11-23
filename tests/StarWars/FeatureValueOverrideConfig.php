<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars;

use FeatureKeys\FeatureConfig\ClassName;
use FeatureKeys\FeatureConfig\FeatureClassNameIterator;
use FeatureKeys\Tests\StarWars\FeatureAccess\Sith\BaneAccess;
use FeatureKeys\Tests\StarWars\FeatureValue\CountryOverride;
use FeatureKeys\Tests\StarWars\FeatureValue\GlobalOverride;

class FeatureValueOverrideConfig extends FeatureClassNameIterator
{
    public function __construct()
    {
        $this->add(new ClassName(GlobalOverride::class));
        $this->add(new ClassName(CountryOverride::class));
    }
}
