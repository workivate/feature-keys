<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;


use FeatureKeys\FeatureValue\Type\OptionFeatureValue\IntegerOptionFeatureValue;

class SithTrainingLevel extends IntegerOptionFeatureValue
{
    private const NAME = 'SITH_TRAINING_LEVEL';

    private const OPTIONS = [
        0,
        7,
        15,
        52,
        89
    ];

    private const DESCRIPTION = 'Defines the sith\'s training level.';

    public function __construct(int $value = 0)
    {
        parent::__construct($value, self::OPTIONS);
    }

    public static function getName(): string
    {
        return self::NAME;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public static function getDescription(): string
    {
        return self::DESCRIPTION;
    }
}
