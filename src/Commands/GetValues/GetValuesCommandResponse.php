<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\GetValues;

use FeatureKeys\FeatureValue\FeatureValueContainer;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class GetValuesCommandResponse
{
    private $values;

    public function __construct(FeatureValueContainer $values)
    {
        $this->values = $values;
    }

    public function getValues(): FeatureValueContainer
    {
        return $this->values;
    }
}
