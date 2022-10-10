<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\SetAccess;

use FeatureKeys\FeatureAccess\FeatureAccess;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class SetAccessCommandResponse
{
    private $access;

    public function __construct(FeatureAccess $access)
    {
        $this->access = $access;
    }

    public function getAccess(): FeatureAccess
    {
        return $this->access;
    }
}
