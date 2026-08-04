<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasMax
{
    protected int|float|Closure|null $max = null;

    public function max(
        int|float|Closure|null $max = null,
    ): int|float|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->max;
        }

        return $this->with(
            'max',
            $max,
        );
    }
}
