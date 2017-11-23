<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue;

use FeatureKeys\FeatureValue\Type\OptionFeatureValue;

class JediTrainingLevel extends OptionFeatureValue
{
    private const NAME = 'JEDI_TRAINING_LEVEL';

    private const OPTIONS = [
        'youngling',
        'padawan',
        'night',
        'master',
    ];

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
}
