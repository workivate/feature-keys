<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars;

use FeatureKeys\FeatureConfig\ClassName;
use FeatureKeys\FeatureConfig\FeatureClassNameIterator;
use FeatureKeys\Tests\StarWars\FeatureAccess\Sith\BaneAccess;
use FeatureKeys\Tests\StarWars\FeatureValue\DrawnToTheDarkSide;
use FeatureKeys\Tests\StarWars\FeatureValue\JediName;
use FeatureKeys\Tests\StarWars\FeatureValue\JediTrainingLevel;
use FeatureKeys\Tests\StarWars\FeatureValue\LightSaberColor;
use FeatureKeys\Tests\StarWars\FeatureValue\MidichlorianCount;
use FeatureKeys\Tests\StarWars\FeatureValue\SithName;
use FeatureKeys\Tests\StarWars\FeatureValue\SithTrainingLevel;
use FeatureKeys\Tests\StarWars\FeatureValue\TrainingCompletion;

class FeatureValueConfig extends FeatureClassNameIterator
{
    public function __construct()
    {
        $this->add(new ClassName(JediName::class));
        $this->add(new ClassName(SithName::class));
        $this->add(new ClassName(JediTrainingLevel::class));
        $this->add(new ClassName(SithTrainingLevel::class));
        $this->add(new ClassName(TrainingCompletion::class));
        $this->add(new ClassName(MidichlorianCount::class));
        $this->add(new ClassName(DrawnToTheDarkSide::class));
        $this->add(new ClassName(LightSaberColor::class));
    }
}
