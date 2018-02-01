<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

final class FeatureAccessContainer implements \Iterator, \Countable
{
    private $accesses = [];

    public function __construct(FeatureAccess ...$accesses)
    {
        foreach ($accesses as $access) {
            $this->set($access);
        }
        $this->validate();
    }

    public function validate(): void
    {
        foreach ($this->accesses as $access) {
            $parent = $access->getParent();
            if ($parent !== null && $access->isEnabled() && $parent->isDisabled()) {
                throw FeatureAccessContainerException::parentDisabled($access::getName(), $parent::getName());
            }
        }
    }

    public function override(FeatureAccessContainer $container): void
    {
        foreach ($container as $access) {
            try {
                $this->get($access::getName())->setEnabled($access->isEnabled());
            } catch (FeatureAccessContainerException $exception) {
                $this->set($access);
            }
        }
        $this->validate();
    }

    public function set(FeatureAccess $featureAccess): void
    {
        if ($this->has($featureAccess::getName())) {
            throw FeatureAccessContainerException::accessAlreadySet($featureAccess::getName());
        }
        $this->accesses[$featureAccess->getName()] = $featureAccess;
    }

    public function get(string $featureAccessName): FeatureAccess
    {
        if (!$this->has($featureAccessName)) {
            throw FeatureAccessContainerException::accessNotFound($featureAccessName);
        }
        return $this->accesses[$featureAccessName];
    }

    public function has(string $featureAccessName): bool
    {
        return isset($this->accesses[$featureAccessName]);
    }

    public function current()
    {
        return current($this->accesses);
    }

    public function next()
    {
        return next($this->accesses);
    }

    public function key()
    {
        return key($this->accesses);
    }

    public function valid(): bool
    {
        return $this->key() !== null;
    }

    public function rewind()
    {
        return reset($this->accesses);
    }

    public function count()
    {
        return count($this->accesses);
    }
}
