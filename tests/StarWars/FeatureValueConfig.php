<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars;

use FeatureKeys\FeatureConfig\ClassName;
use FeatureKeys\FeatureConfig\FeatureClassNameIterator;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith\BaneAccess;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\DrawnToTheDarkSide;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\JediName;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\JediTrainingLevel;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\LightSaberColor;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\MidichlorianCount;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\SithName;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\SithTrainingLevel;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\TrainingCompletion;

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
