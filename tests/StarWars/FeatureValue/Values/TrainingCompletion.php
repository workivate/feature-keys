<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\PercentageFeatureValue;

class TrainingCompletion extends PercentageFeatureValue
{
    private const NAME = 'TRAINING_COMPLETION';

    private const DESCRIPTION = 'In 1971, Universal Studios made a contract for George Lucas to direct two films. In 1973, American Graffiti was completed, and released to critical acclaim including Academy Award nominations for Best Director and Original Screenplay for George Lucas.';

    public function __construct(int $completion = 0)
    {
        parent::__construct($completion);
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
