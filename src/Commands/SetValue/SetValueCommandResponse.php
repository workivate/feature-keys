<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\SetValue;

use FeatureKeys\FeatureValue\FeatureValue;

final class SetValueCommandResponse
{
    private $value;

    public function __construct(FeatureValue $value)
    {
        $this->value = $value;
    }

    public function getValue(): FeatureValue
    {
        return $this->value;
    }
}
