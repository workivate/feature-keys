<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue;

use FeatureKeys\FeatureValue\Type\PercentageFeatureValue;

class TrainingCompletion extends PercentageFeatureValue
{
    private const NAME = 'TRAINING_COMPLETION';

    public function __construct(int $completion = 0)
    {
        parent::__construct($completion);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
