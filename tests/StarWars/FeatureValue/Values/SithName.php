<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\StringFeatureValue;

class SithName extends StringFeatureValue
{
    private const NAME = 'SITH_NAME';

    private const DESCRIPTION = 'A stormtrooper is a fictional soldier in the Star Wars franchise created by George Lucas. Introduced in Star Wars (1977), the stormtroopers are the main ground force of the Galactic Empire, under the leadership of Emperor Palpatine and his commanders, most notably Darth Vader and Grand Moff Tarkin.';

    public function __construct(string $name = '')
    {
        parent::__construct($name);
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
