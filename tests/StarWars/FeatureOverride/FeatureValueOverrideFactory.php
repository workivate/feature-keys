<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars\FeatureOverride;

use FeatureKeys\FeatureOverride\FeatureOverride;
use FeatureKeys\FeatureOverride\FeatureOverrideFactory;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\CountryOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\GlobalOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\CountryId;

class FeatureValueOverrideFactory implements FeatureOverrideFactory
{
    private $countryId;

    public function __construct(CountryId $countryId)
    {
        $this->countryId = $countryId;
    }

    public function createFromName(string $overrideName): FeatureOverride
    {
        switch ($overrideName) {
            case GlobalOverride::getName():
                return new GlobalOverride();
            case CountryOverride::getName():
                return new CountryOverride($this->countryId);
            default:
                throw new \RuntimeException("Unknown override $overrideName");
        }
    }
}
