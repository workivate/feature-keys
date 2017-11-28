<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\Commands;

use FeatureKeys\Commands\SetValue\SetValueCommand;
use FeatureKeys\Commands\SetValue\SetValueCommandHandler;
use FeatureKeys\FeatureValue\FeatureValueRepository;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\CountryOverride;
use FeatureKeys\Tests\StarWars\FeatureOverride\Parameters\CountryId;
use FeatureKeys\Tests\StarWars\FeatureValue\Values\LightSaberColor;
use PHPUnit\Framework\TestCase;

class SetValueTest extends TestCase
{
    private $repository;

    public function setUp(): void
    {
        $this->repository = \Mockery::mock(FeatureValueRepository::class)
            ->shouldReceive('save')
            ->getMock();
    }

    public function testCanSetValue(): void
    {
        $value = new LightSaberColor('blue');
        $override = new CountryOverride(new CountryId('polska'));

        $command = new SetValueCommand($value, $override);
        $commandHandler = new SetValueCommandHandler($this->repository);
        $response = $commandHandler($command);

        self::assertSame($value, $response->getValue());
    }
}
