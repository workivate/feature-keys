<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride\Overrides;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\CountryId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\UniverseId;

class CountryAndUniverseOverride extends FeatureOverride
{
    private const NAME = 'COUNTRY_AND_UNIVERSE';

    public function __construct(CountryId $countryId, UniverseId $universeId)
    {
        parent::__construct(...[$countryId, $universeId]);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
