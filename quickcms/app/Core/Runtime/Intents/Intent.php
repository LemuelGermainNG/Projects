<?php

declare(strict_types=1);

namespace App\Core\Runtime\Intents;

final class Intent
{
    /**
     * Register an intent.
     */
    public static function register(
        string $intent,
        string $handler,
    ): void {
        app(IntentRegistry::class)
            ->register($intent, $handler);
    }

    /**
     * Dispatch an intent.
     */
    public static function dispatch(
        string $intent,
        mixed ...$arguments,
    ): mixed {
        return app(IntentDispatcher::class)
            ->dispatch($intent, ...$arguments);
    }

    /**
     * Determine whether the intent exists.
     */
    public static function has(string $intent): bool
    {
        return app(IntentRegistry::class)
            ->has($intent);
    }
}
