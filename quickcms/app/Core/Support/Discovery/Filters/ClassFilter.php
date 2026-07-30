<?php

declare(strict_types=1);

namespace App\Core\Support\Discovery\Filters;

use ReflectionClass;

final class ClassFilter
{
    /**
     * @var list<string>
     */
    protected array $interfaces = [];

    protected ?string $parent = null;

    /**
     * @var list<callable(ReflectionClass): bool>
     */
    protected array $callbacks = [];

    public function implementing(string $interface): static
    {
        $this->interfaces[] = $interface;

        return $this;
    }

    public function extending(string $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    public function where(callable $callback): static
    {
        $this->callbacks[] = $callback;

        return $this;
    }

    public function passes(ReflectionClass $reflection): bool
    {
        if ($reflection->isAbstract()) {
            return false;
        }

        foreach ($this->interfaces as $interface) {
            if (! $reflection->implementsInterface($interface)) {
                return false;
            }
        }

        if (
            $this->parent !== null &&
            ! $reflection->isSubclassOf($this->parent)
        ) {
            return false;
        }

        foreach ($this->callbacks as $callback) {
            if (! $callback($reflection)) {
                return false;
            }
        }

        return true;
    }
}
