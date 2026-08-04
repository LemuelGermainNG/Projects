<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasLimit
{
    protected int|Closure|null $limit = null;

    public function limit(
        int|Closure|null $limit = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->limit;
        }

        return $this->with(
            'limit',
            $limit,
        );
    }
}
