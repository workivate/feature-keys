<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureConfig;

trait IteratorTrait
{
    private $index = 0;

    private $config = [];

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
