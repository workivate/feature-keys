<?php
declare(strict_types=1);

namespace FeatureKeys\Commands\SetValue;

use FeatureKeys\FeatureValue\FeatureValueRepository;

/**
 * @deprecated No longer supported, no replacement is given
 */
final class SetValueCommandHandler
{
    private $repository;

    public function __construct(FeatureValueRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(SetValueCommand $command): SetValueCommandResponse
    {
        $this->repository->save($command->getValue(), $command->getOverride());
        return new SetValueCommandResponse($command->getValue());
    }
}
