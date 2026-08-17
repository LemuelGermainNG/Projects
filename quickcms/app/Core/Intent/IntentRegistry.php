<?php

declare(strict_types=1);

namespace App\Core\Intent;

final class IntentRegistry
{
    /**
     * @var array<string, class-string>
     */
    private array $intents = [];

    /**
     * Register an intent.
     */
    public function register(
        string $intent,
        string $handler,
    ): void {
        $this->intents[$intent] = $handler;
    }

    /**
     * Returns the registered handler.
     */
    public function handler(string $intent): ?string
    {
        return $this->intents[$intent] ?? null;
    }

    /**
     * Determine whether an intent exists.
     */
    public function has(string $intent): bool
    {
        return isset($this->intents[$intent]);
    }
}
