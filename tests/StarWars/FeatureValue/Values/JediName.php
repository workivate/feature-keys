<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\StringFeatureValue;

class JediName extends StringFeatureValue
{
    private const NAME = 'JEDI_NAME';

    public function __construct(string $name = '')
    {
        parent::__construct($name);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
