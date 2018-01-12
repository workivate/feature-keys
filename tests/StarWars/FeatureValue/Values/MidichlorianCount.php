<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\IntegerFeatureValue;

class MidichlorianCount extends IntegerFeatureValue
{
    private const NAME = 'MIDICHLORIAN_COUNT';

    private const NON_FORCE_SENSITIVE_COUNT = 2000;

    private const DESCRIPTION = 'Defines the count of midichlorian';

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
