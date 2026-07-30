<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasRoute
{
    protected ?string $route = null;

    public function route(?string $route = null): string|null|static
    {
        if (func_num_args() === 0) {
            return $this->route;
        }

        return $this->with('route', $route);
    }
}
