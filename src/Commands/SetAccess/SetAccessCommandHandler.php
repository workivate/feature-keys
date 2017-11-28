<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\SetAccess;

use FeatureKeys\FeatureAccess\FeatureAccessRepository;

final class SetAccessCommandHandler
{
    private $repository;

    public function __construct(FeatureAccessRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(SetAccessCommand $command): SetAccessCommandResponse
    {
        $access = $command->getAccess();
        $override = $command->getOverride();
        $accesses = $this->repository->getForSpecificOverride($override);
        $accesses->get($access::getName())->setEnabled($access->isEnabled());
        $accesses->validate();
        $this->repository->save($access, $override);
        return new SetAccessCommandResponse($access);
    }
}
