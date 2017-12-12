<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureConfig;

abstract class FeatureClassNameIterator implements \Iterator
{
    use IteratorTrait;

    public function add(ClassName $configElement): void
    {
        $this->config[] = $configElement;
    }

    public function current(): ClassName
    {
        return $this->config[$this->index];
    }
}
