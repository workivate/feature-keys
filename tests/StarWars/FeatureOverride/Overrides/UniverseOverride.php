<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride\Overrides;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\UniverseId;

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
