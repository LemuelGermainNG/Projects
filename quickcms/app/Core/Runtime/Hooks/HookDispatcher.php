<?php

declare(strict_types=1);

namespace App\Core\Runtime\Hooks;

use Illuminate\Contracts\Container\Container;

final class HookDispatcher
{
    public function __construct(
        private readonly HookRegistry $registry,
        private readonly Container $container,
    ) {
    }

    /**
     * Dispatch a hook.
     *
     * @return array<int, mixed>
     */
    public function dispatch(
        string $hook,
        mixed ...$arguments,
    ): array {
        $results = [];

        foreach ($this->registry->listeners($hook) as $listener) {
            $results[] = $this->container
                ->make($listener)(...$arguments);
        }

        return $results;
    }
}
