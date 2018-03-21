<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureValue;

final class FeatureValueContainer implements \Iterator, \Countable
{
    private $values = [];

    public function __construct(FeatureValue ...$values)
    {
        foreach ($values as $value) {
            $this->set($value);
        }
    }

    public function override(FeatureValueContainer $container): void
    {
        foreach ($container as $value) {
            try {
                $this->get($value::getName())->setValue($value->getValue());
            } catch (FeatureValueContainerException $exception) {
                $this->set($value);
            }
        }
    }

    public function set(FeatureValue $featureValue): void
    {
        if ($this->has($featureValue::getName())) {
            throw FeatureValueContainerException::valueAlreadySet($featureValue::getName());
        }
        $this->values[$featureValue::getName()] = $featureValue;
    }

    public function get(string $featureValueName): FeatureValue
    {
        if (!$this->has($featureValueName)) {
            throw FeatureValueContainerException::valueNotFound($featureValueName);
        }
        return $this->values[$featureValueName];
    }

    public function has(string $FeatureValueName): bool
    {
        return isset($this->values[$FeatureValueName]);
    }

    public function current()
    {
        return current($this->values);
    }

    public function next()
    {
        return next($this->values);
    }

    public function key()
    {
        return key($this->values);
    }

    public function valid(): bool
    {
        return $this->key() !== null;
    }

    public function rewind()
    {
        return reset($this->values);
    }

    public function count()
    {
        return count($this->values);
    }
}
