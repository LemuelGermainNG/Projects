<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasCache
{
    protected int|Closure|null $cache = null;

    public function cache(
        int|Closure|null $cache = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->cache;
        }

        return $this->with(
            'cache',
            $cache,
        );
    }
}
