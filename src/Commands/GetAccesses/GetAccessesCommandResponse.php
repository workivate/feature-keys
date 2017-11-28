<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\GetAccesses;

use FeatureKeys\FeatureAccess\FeatureAccessContainer;

final class GetAccessesCommandResponse
{
    private $accesses;

    public function __construct(FeatureAccessContainer $accesses)
    {
        $this->accesses = $accesses;
    }

    public function getAccesses(): FeatureAccessContainer
    {
        return $this->accesses;
    }
}
