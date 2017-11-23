<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureConfig;

abstract class FeatureClassNameIterator implements \Iterator
{
    private $index = 0;

    private $config = [];

    public function add(ClassName $configElement): void
    {
        $this->config[] = $configElement;
    }

    public function current(): ClassName
    {
        return $this->config[$this->index];
    }

    public function next(): void
    {
        ++$this->index;
    }

    public function key(): int
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return isset($this->config[$this->index]);
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}
