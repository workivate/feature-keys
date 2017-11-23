<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars;

use FeatureKeys\FeatureAccess\FeatureAccessConfigElement as ConfigElement;
use FeatureKeys\FeatureAccess\FeatureAccessConfigIterator;
use FeatureKeys\FeatureConfig\ClassName;
use FeatureKeys\Tests\StarWars\FeatureAccess\Jedi\AnakinAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Jedi\JediAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Jedi\LukeAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Jedi\ObiWanAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Jedi\QuiGonAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Jedi\YodaAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Sith\BaneAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Sith\DookuAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Sith\PlagueisAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Sith\SidiousAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Sith\SithAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Sith\VaderAccess;

class FeatureAccessConfig extends FeatureAccessConfigIterator
{
    public function __construct()
    {
        $this->addJediConfig();
        $this->addSithConfig();
    }

    private function addJediConfig(): void
    {
        $this->add(new ConfigElement(new ClassName(JediAccess::class), null));
        $this->add(new ConfigElement(new ClassName(YodaAccess::class), new ClassName(JediAccess::class)));
        $this->add(new ConfigElement(new ClassName(QuiGonAccess::class), new ClassName(YodaAccess::class)));
        $this->add(new ConfigElement(new ClassName(ObiWanAccess::class), new ClassName(QuiGonAccess::class)));
        $this->add(new ConfigElement(new ClassName(AnakinAccess::class), new ClassName(ObiWanAccess::class)));
        $this->add(new ConfigElement(new ClassName(LukeAccess::class), new ClassName(ObiWanAccess::class)));
    }

    private function addSithConfig(): void
    {
        $this->add(new ConfigElement(new ClassName(SithAccess::class), null));
        $this->add(new ConfigElement(new ClassName(PlagueisAccess::class), new ClassName(SithAccess::class)));
        $this->add(new ConfigElement(new ClassName(SidiousAccess::class), new ClassName(PlagueisAccess::class)));
        $this->add(new ConfigElement(new ClassName(DookuAccess::class), new ClassName(SidiousAccess::class)));
        $this->add(new ConfigElement(new ClassName(VaderAccess::class), new ClassName(SidiousAccess::class)));
    }
}
