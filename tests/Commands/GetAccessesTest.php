<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\Commands;

use FeatureKeys\Commands\GetAccesses\GetAccessesCommand;
use FeatureKeys\Commands\GetAccesses\GetAccessesCommandHandler;
use FeatureKeys\FeatureAccess\FeatureAccessContainerFactory;
use FeatureKeys\FeatureAccess\FeatureAccessRepository;
use FeatureKeys\Tests\StarWars\FeatureAccessConfig;
use FeatureKeys\Tests\StarWars\FeatureAccessOverrideConfig;
use FeatureKeys\Tests\StarWars\FeatureOverride\FeatureAccessOverrideContainerFactory;
use FeatureKeys\Tests\StarWars\FeatureOverride\FeatureAccessOverrideFactory;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\CountryId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\PlayerId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\TeamId;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\UniverseId;
use PHPUnit\Framework\TestCase;

class GetAccessesTest extends TestCase
{
    private $overrides;

    private $repository;

    private $accesses;

    public function setUp(): void
    {
        $overridesFactory = new FeatureAccessOverrideContainerFactory(
            new FeatureAccessOverrideFactory(
                new PlayerId('darkslayer097'),
                new TeamId('GoVirtusPro'),
                new UniverseId('Tatooine'),
                new CountryId('polska')
            )
        );
        $this->overrides = $overridesFactory->createFromConfig(new FeatureAccessOverrideConfig());
        $accessesFactory = new FeatureAccessContainerFactory(new FeatureAccessConfig());
        $this->accesses = $accessesFactory->create();
        $this->repository = \Mockery::mock(FeatureAccessRepository::class)
            ->shouldReceive('getForOverrides')
            ->andReturn($this->accesses)
            ->getMock();
    }

    public function testCanGetAccesses(): void
    {
        $command = new GetAccessesCommand($this->overrides);
        $commandHandler = new GetAccessesCommandHandler($this->repository);
        $response = $commandHandler($command);
        self::assertSame($this->accesses, $response->getAccesses());
    }
}
