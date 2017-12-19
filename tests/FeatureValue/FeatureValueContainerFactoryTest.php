<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\FeatureValue;

use FeatureKeys\FeatureConfig\FeatureClassNameIterator;
use FeatureKeys\FeatureValue\FeatureValueContainer;
use FeatureKeys\FeatureValue\FeatureValueContainerFactory;
use FeatureKeys\Tests\StarWars\FeatureValueConfig;
use PHPUnit\Framework\TestCase;

class FeatureValueContainerFactoryTest extends TestCase
{
    public function testCanCreateContainerFromConfig(): void
    {
        $config = new FeatureValueConfig();
        $container = (new FeatureValueContainerFactory($config))->create();

        self::assertInstanceOf(FeatureValueContainer::class, $container);
        self::assertCount(
            $this->countConfigElements($config),
            $container->getAll()
        );
    }

    private function countConfigElements(FeatureClassNameIterator $config): int
    {
        $count = 0;
        foreach ($config as $element) {
            ++$count;
        }
        return $count;
    }
}
