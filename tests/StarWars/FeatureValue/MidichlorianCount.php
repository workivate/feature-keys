<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue;

use FeatureKeys\FeatureValue\Type\IntegerFeatureValue;

class MidichlorianCount extends IntegerFeatureValue
{
    private const NAME = 'MIDICHLORIAN_COUNT';

    private const NON_FORCE_SENSITIVE_COUNT = 2000;

    public function __construct(int $count = self::NON_FORCE_SENSITIVE_COUNT)
    {
        parent::__construct($count);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
