<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\StringFeatureValue;

class SithName extends StringFeatureValue
{
    private const NAME = 'SITH_NAME';

    public function __construct(string $name = '')
    {
        parent::__construct($name);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
