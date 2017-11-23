<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue;

use FeatureKeys\FeatureValue\Type\BooleanFeatureValue;

class DrawnToTheDarkSide extends BooleanFeatureValue
{
    private const NAME = 'DRAWN_TO_THE_DARK_SIDE';

    public function __construct($isDrawn = true)
    {
        parent::__construct($isDrawn);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
