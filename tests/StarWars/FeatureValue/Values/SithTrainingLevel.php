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

    private const DESCRIPTION = 'R2-D2 (/ɑːrtuː.diːtuː/), or Artoo-Detoo[citation needed], is a fictional robot character in the Star Wars franchise created by George Lucas. A small astromech droid, R2-D2 is a major character and appears in all 8 Star Wars films to date.';

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
