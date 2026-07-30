<?php

declare(strict_types=1);

namespace App\Core\Runtime\Hooks;

final class Hook
{
    /**
     * Register a hook listener.
     */
    public static function listen(
        string $hook,
        string $listener,
    ): void {
        app(HookRegistry::class)
            ->register($hook, $listener);
    }

    /**
     * Dispatch a hook.
     *
     * @return array<int, mixed>
     */
    public static function dispatch(
        string $hook,
        mixed ...$arguments,
    ): array {
        return app(HookDispatcher::class)
            ->dispatch($hook, ...$arguments);
    }

    /**
     * Determine whether the hook exists.
     */
    public static function has(string $hook): bool
    {
        return app(HookRegistry::class)
            ->has($hook);
    }
}
