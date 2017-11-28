<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\SetAccess;

use FeatureKeys\FeatureAccess\FeatureAccess;
use FeatureKeys\FeatureOverride\FeatureOverride;

final class SetAccessCommand
{
    private $access;

    private $override;

    public function __construct(FeatureAccess $access, FeatureOverride $override)
    {
        $this->access = $access;
        $this->override = $override;
    }

    public function getAccess(): FeatureAccess
    {
        return $this->access;
    }

    public function getOverride(): FeatureOverride
    {
        return $this->override;
    }
}
