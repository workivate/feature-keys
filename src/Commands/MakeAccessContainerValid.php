<?php
declare(strict_types=1);

namespace FeatureKeys\Commands;

use FeatureKeys\FeatureAccess\FeatureAccessContainer;
use FeatureKeys\FeatureAccess\ParentDisabledException;

final class MakeAccessContainerValid
{
    public function execute(FeatureAccessContainer $container): void
    {
        try {
            $container->validate();
        } catch (ParentDisabledException $exception) {
            $container->get($exception->getParentAccessName())->setEnabled(true);
            $this->execute($container);
        }
    }
}
