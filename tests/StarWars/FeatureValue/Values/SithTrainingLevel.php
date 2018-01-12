<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\OptionFeatureValue;

class SithTrainingLevel extends OptionFeatureValue
{
    private const NAME = 'SITH_TRAINING_LEVEL';

    private const OPTIONS = [
        'minion',
        'adept',
        'acolyte',
        'assassin',
        'warrior',
        'marauder',
        'lord',
    ];

    private const DESCRIPTION = 'Defines the sith\'s training level.';

    public function __construct(string $value = 'minion')
    {
        parent::__construct($value, self::OPTIONS);
    }

    public static function getName(): string
    {
        return self::NAME;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function getDescription(): string
    {
        return self::DESCRIPTION;
    }
}
