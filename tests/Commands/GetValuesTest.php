<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\Commands;

use FeatureKeys\Commands\GetValues\GetValuesCommand;
use FeatureKeys\Commands\GetValues\GetValuesCommandHandler;
use FeatureKeys\FeatureValue\FeatureValueContainerFactory;
use FeatureKeys\FeatureValue\FeatureValueRepository;
use FeatureKeys\Tests\StarWars\FeatureOverride\FeatureValueOverrideContainerFactory;
use FeatureKeys\Tests\StarWars\FeatureOverride\FeatureValueOverrideFactory;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\CountryId;
use FeatureKeys\Tests\StarWars\FeatureValueConfig;
use FeatureKeys\Tests\StarWars\FeatureValueOverrideConfig;
use PHPUnit\Framework\TestCase;

class GetValuesTest extends TestCase
{
    private $overrides;

    private $repository;

    private $values;

    public function setUp(): void
    {
        $overridesFactory = new FeatureValueOverrideContainerFactory(
            new FeatureValueOverrideFactory(new CountryId('polska'))
        );
        $this->overrides = $overridesFactory->createFromConfig(new FeatureValueOverrideConfig());
        $valuesFactory = new FeatureValueContainerFactory();
        $this->values = $valuesFactory(new FeatureValueConfig());
        $this->repository = \Mockery::mock(FeatureValueRepository::class)
            ->shouldReceive('getForOverrides')
            ->andReturn($this->values)
            ->getMock();
    }

    public function testCanGetValues(): void
    {
        $command = new GetValuesCommand($this->overrides);
        $commandHandler = new GetValuesCommandHandler($this->repository);
        $response = $commandHandler($command);
        self::assertSame($this->values, $response->getValues());
    }
}
