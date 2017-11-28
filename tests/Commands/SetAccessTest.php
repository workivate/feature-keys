<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\Commands;

use FeatureKeys\Commands\SetAccess\SetAccessCommand;
use FeatureKeys\Commands\SetAccess\SetAccessCommandHandler;
use FeatureKeys\FeatureAccess\FeatureAccessRepository;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\JediAccess;
use FeatureKeys\Tests\StarWars\FeatureOverride\Overrides\GlobalOverride;
use PHPUnit\Framework\TestCase;

class SetAccessTest extends TestCase
{
    private $repository;

    public function setUp(): void
    {
        $this->repository = \Mockery::mock(FeatureAccessRepository::class)
            ->shouldReceive('save')
            ->getMock();
    }

    public function testCanSetAccess(): void
    {
        $access = new JediAccess();
        $override = new GlobalOverride();

        $command = new SetAccessCommand($access, $override);
        $commandHandler = new SetAccessCommandHandler($this->repository);
        $response = $commandHandler($command);

        self::assertSame($access, $response->getAccess());
    }
}
