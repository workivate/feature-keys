<?php
declare(strict_types=1);

namespace FeatureKeys\Tests\StarWars;

use FeatureKeys\FeatureAccess\FeatureAccessConfigElement as ConfigElement;
use FeatureKeys\FeatureAccess\FeatureAccessConfigIterator;
use FeatureKeys\FeatureConfig\ClassName;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\AnakinAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\JediAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\LukeAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\ObiWanAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\QuiGonAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Jedi\YodaAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith\DookuAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith\PlagueisAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith\SidiousAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith\SithAccess;
use FeatureKeys\Tests\StarWars\FeatureAccess\Accesses\Sith\VaderAccess;

class FeatureAccessConfig extends FeatureAccessConfigIterator
{
    public function __construct()
    {
        $this->addJediAccessConfig();
        $this->addSithAccessConfig();
    }

    private function addJediAccessConfig(): void
    {
        $this->add(new ConfigElement(new ClassName(JediAccess::class), null));
        $this->add(new ConfigElement(new ClassName(YodaAccess::class), new ClassName(JediAccess::class)));
        $this->add(new ConfigElement(new ClassName(QuiGonAccess::class), new ClassName(YodaAccess::class)));
        $this->add(new ConfigElement(new ClassName(ObiWanAccess::class), new ClassName(QuiGonAccess::class)));
        $this->add(new ConfigElement(new ClassName(AnakinAccess::class), new ClassName(ObiWanAccess::class)));
        $this->add(new ConfigElement(new ClassName(LukeAccess::class), new ClassName(ObiWanAccess::class)));
    }

    private function addSithAccessConfig(): void
    {
        $this->add(new ConfigElement(new ClassName(SithAccess::class), null));
        $this->add(new ConfigElement(new ClassName(PlagueisAccess::class), new ClassName(SithAccess::class)));
        $this->add(new ConfigElement(new ClassName(SidiousAccess::class), new ClassName(PlagueisAccess::class)));
        $this->add(new ConfigElement(new ClassName(DookuAccess::class), new ClassName(SidiousAccess::class)));
        $this->add(new ConfigElement(new ClassName(VaderAccess::class), new ClassName(SidiousAccess::class)));
    }
}
