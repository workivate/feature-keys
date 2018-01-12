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

    private const DESCRIPTION = 'Months later, Lucas started work on his second film\'s script draft, The Journal of the Whills, telling the tale of the training of apprentice CJ Thorpe as a "Jedi-Bendu" space commando by the legendary Mace Windy.';

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
