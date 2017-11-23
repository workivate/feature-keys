<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\CountryId;

class CountryOverride extends FeatureOverride
{
    private const NAME = 'COUNTRY';

    public function __construct(CountryId $countryId)
    {
        parent::__construct(...[$countryId]);
    }

    public static function getName(): string
    {
        return self::NAME;
    }
}
