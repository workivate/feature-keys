<?php
declare(strict_types=1);

namespace FeatureKeys\FeatureAccess;

final class FeatureAccessContainer
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
                throw ParentDisabledException::create($access::getName(), $parent::getName());
            }
        }
    }

    public function override(FeatureAccessContainer $container): void
    {
        foreach ($container->getAll() as $access) {
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

    public function getAll(): array
    {
        return $this->accesses;
    }

    public function getChildren(string $parentAccessName): array
    {
        $children = [];

        foreach ($this->accesses as $access) {
            if ($access->getParent() === null) {
                continue;
            }

            if ($access->getParent()::getName() === $parentAccessName) {
                $children[] = $access;
            }
        }

        return $children;
    }
}
