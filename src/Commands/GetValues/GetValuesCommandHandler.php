<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\GetValues;

use FeatureKeys\FeatureValue\FeatureValueRepository;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class GetValuesCommandHandler
{
    private $repository;

    public function __construct(FeatureValueRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GetValuesCommand $command): GetValuesCommandResponse
    {
        $accesses = $this->repository->getForOverrides($command->getOverrides());
        return new GetValuesCommandResponse($accesses);
    }
}
