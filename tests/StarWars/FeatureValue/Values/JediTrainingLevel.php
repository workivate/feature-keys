<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\OptionFeatureValue\StringOptionFeatureValue;

class JediTrainingLevel extends StringOptionFeatureValue
{
    private const NAME = 'JEDI_TRAINING_LEVEL';

    private const OPTIONS = [
        'youngling',
        'padawan',
        'knight',
        'master',
    ];

    private const DESCRIPTION = 'Defines the jedi\'s training level.';

    public function __construct(string $value = 'youngling')
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
