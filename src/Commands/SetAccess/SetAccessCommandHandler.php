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
        $this->repository->save($command->getAccess(), $command->getOverride());
        return new SetAccessCommandResponse($command->getAccess());
    }
}
