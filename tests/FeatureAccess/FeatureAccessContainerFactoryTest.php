<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\FeatureAccess;

use FeatureKeys\FeatureAccess\FeatureAccessConfigIterator;
use FeatureKeys\FeatureAccess\FeatureAccessContainer;
use FeatureKeys\FeatureAccess\FeatureAccessContainerFactory;
use FeatureKeys\Tests\StarWars\FeatureAccessConfig;
use PHPUnit\Framework\TestCase;

class FeatureAccessContainerFactoryTest extends TestCase
{
    public function testCanCreateContainerFromConfig(): void
    {
        $config = new FeatureAccessConfig();
        $container = (new FeatureAccessContainerFactory($config))->create();
        self::assertInstanceOf(FeatureAccessContainer::class, $container);
        self::assertCount(
            $this->countConfigElements($config),
            $container
        );
    }

    private function countConfigElements(FeatureAccessConfigIterator $config): int
    {
        $count = 0;
        foreach ($config as $element) {
            ++$count;
        }
        return $count;
    }
}
