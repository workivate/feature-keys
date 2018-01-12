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

    private const DESCRIPTION = 'Defines the light saber\'s color.';

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

    public static function getDescription(): string
    {
        return self::DESCRIPTION;
    }
}
