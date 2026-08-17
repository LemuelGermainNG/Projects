<?php

declare(strict_types=1);

namespace App\Core\Hook;

final class HookRegistry
{
    /**
     * @var array<string, list<class-string>>
     */
    private array $hooks = [];

    /**
     * Register a hook listener.
     */
    public function register(string $hook, string $listener): void
    {
        $this->hooks[$hook][] = $listener;
    }

    /**
     * Returns all listeners registered for the hook.
     *
     * @return list<class-string>
     */
    public function listeners(string $hook): array
    {
        return $this->hooks[$hook] ?? [];
    }

    /**
     * Determine whether the hook has listeners.
     */
    public function has(string $hook): bool
    {
        return isset($this->hooks[$hook]);
    }
}
