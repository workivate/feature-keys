<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

abstract class FeatureAccessConfigIterator implements \Iterator
{
    private $index = 0;

    private $config = [];

    protected function add(FeatureAccessConfigElement $configElement): void
    {
        $this->config[] = $configElement;
    }

    public function current(): FeatureAccessConfigElement
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
