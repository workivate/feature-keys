<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

use FeatureKeys\FeatureConfig\IteratorTrait;

abstract class FeatureAccessConfigIterator implements \Iterator
{
    use IteratorTrait;

    protected function add(FeatureAccessConfigElement $configElement): void
    {
        $this->config[] = $configElement;
    }

    public function current(): FeatureAccessConfigElement
    {
        return $this->config[$this->index];
    }
}
