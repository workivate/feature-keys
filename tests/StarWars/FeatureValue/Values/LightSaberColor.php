<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\OptionFeatureValue;

class LightSaberColor extends OptionFeatureValue
{
    private const NAME = 'LIGHT_SABER_COLOR';

    private const OPTIONS = [
        'red',
        'blue',
        'green',
    ];

    public function __construct(string $value = 'red')
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
