<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\Commands;

use FeatureKeys\Commands\MakeAccessContainerValid;
use FeatureKeys\FeatureAccess\FeatureAccessContainer;
use FeatureKeys\FeatureAccess\FeatureAccessContainerFactory;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\JediAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\QuiGonAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\YodaAccess;
use FeatureKeys\Tests\StarWars\FeatureAccessConfig;
use PHPUnit\Framework\TestCase;

class MakeAccessContainerValidTest extends TestCase
{
    private $containerFactory;

    public function setUp(): void
    {
        parent::setUp();
        $this->containerFactory = new FeatureAccessContainerFactory(new FeatureAccessConfig());
    }

    public function testMakesContainerValid(): void
    {
        $container = $this->containerFactory->create();
        $container->get(JediAccess::getName())->setEnabled(false);
        $container->get(YodaAccess::getName())->setEnabled(false);
        $container->get(QuiGonAccess::getName())->setEnabled(true);

        $makeContainerValid = new MakeAccessContainerValid(new FeatureAccessConfig());
        $makeContainerValid->execute($container);

        self::assertInstanceOf(FeatureAccessContainer::class, $container);
    }
}
