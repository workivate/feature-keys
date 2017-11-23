<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureValue;

use FeatureKeys\FeatureOverride\FeatureOverride;

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
