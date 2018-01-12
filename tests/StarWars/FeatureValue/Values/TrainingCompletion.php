<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue\Values;

use FeatureKeys\FeatureValue\Type\PercentageFeatureValue;

class TrainingCompletion extends PercentageFeatureValue
{
    private const NAME = 'TRAINING_COMPLETION';

    private const DESCRIPTION = 'Defines the percentage of completion of the training.';

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
