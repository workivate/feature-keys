<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\GetAccesses;

use FeatureKeys\FeatureAccess\FeatureAccessRepository;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class GetAccessesCommandHandler
{
    private $repository;

    public function __construct(FeatureAccessRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GetAccessesCommand $command): GetAccessesCommandResponse
    {
        $accesses = $this->repository->getForOverrides($command->getOverrides());
        return new GetAccessesCommandResponse($accesses);
    }
}
