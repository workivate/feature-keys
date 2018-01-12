<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\IntegerFeatureValue;

class MidichlorianCount extends IntegerFeatureValue
{
    private const NAME = 'MIDICHLORIAN_COUNT';

    private const NON_FORCE_SENSITIVE_COUNT = 2000;

    private const DESCRIPTION = 'Lucas insisted that the movie would be part of a 9-part series and negotiated to retain the sequel rights, to ensure all the movies would be made.';

    public function __construct(int $count = self::NON_FORCE_SENSITIVE_COUNT)
    {
        parent::__construct($count);
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
