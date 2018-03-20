<?php
declare(strict_types=1);

namespace FeatureKeys\Commands;

use FeatureKeys\FeatureAccess\FeatureAccessContainer;
use FeatureKeys\FeatureAccess\ParentDisabledException;

final class MakeAccessContainerValid
{
    private $enabledAccessesNames = [];

    /**
     * Recursively enable parent accesses until the container is valid.
     * @return a list of enabled accesses' names.
     */
    public function execute(FeatureAccessContainer $container): array
    {
        try {
            $container->validate();
        } catch (ParentDisabledException $exception) {
            $parentAccess = $container->get($exception->getParentAccessName());
            $parentAccess->setEnabled(true);
            $this->enabledAccessesNames[] = $parentAccess::getName();
            $this->execute($container);
        }

        return $this->enabledAccessesNames;
    }
}
