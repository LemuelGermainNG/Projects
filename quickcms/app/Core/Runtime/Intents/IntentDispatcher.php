<?php

declare(strict_types=1);

namespace App\Core\Runtime\Intents;

use Illuminate\Contracts\Container\Container;

final class IntentDispatcher
{
    public function __construct(
        private readonly IntentRegistry $registry,
        private readonly Container $container,
    ) {
    }

    /**
     * Dispatch an intent.
     */
    public function dispatch(
        string $intent,
        mixed ...$arguments,
    ): mixed {
        $handler = $this->registry->handler($intent);

        if ($handler === null) {
            return null;
        }

        return $this->container
            ->make($handler)(...$arguments);
    }
}
