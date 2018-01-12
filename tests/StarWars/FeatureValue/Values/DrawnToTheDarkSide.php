<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\BooleanFeatureValue;

class DrawnToTheDarkSide extends BooleanFeatureValue
{
    private const NAME = 'DRAWN_TO_THE_DARK_SIDE';

    private const DESCRIPTION = 'Defines if the user was drawn to the dark side.';

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
