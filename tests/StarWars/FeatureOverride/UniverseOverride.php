<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue;

use FeatureKeys\FeatureOverride\FeatureOverride;

class UniverseOverride extends FeatureOverride
{
    private const NAME = 'UNIVERSE';

    public function __construct(UniverseId $universeId)
    {
        parent::__construct(...[$universeId]);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
