<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\BooleanFeatureValue;

class DrawnToTheDarkSide extends BooleanFeatureValue
{
    private const NAME = 'DRAWN_TO_THE_DARK_SIDE';

    private const DESCRIPTION = 'The Star Wars franchise takes place in a distant unnamed fictional galaxy at an undetermined point in the ancient past, where many species of aliens (often humanoid) co-exist. People own robotic droids, who assist them in their daily routines, and space travel is common.';

    public function __construct($isDrawn = true)
    {
        parent::__construct($isDrawn);
    }

    public static function getName(): string
    {
        return self::NAME;
    }

    public static function getDescription(): string
    {
        return self::DESCRIPTION;
    }
}
