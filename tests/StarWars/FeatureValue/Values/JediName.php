<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\StringFeatureValue;

class JediName extends StringFeatureValue
{
    private const NAME = 'JEDI_NAME';

    private const DESCRIPTION = 'The spiritual and mystical element of the Star Wars galaxy is known as "the Force". It is described in the original film as "an energy field created by all living things [that] surrounds us, penetrates us, [and] binds the galaxy together.';

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
