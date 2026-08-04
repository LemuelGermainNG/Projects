<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasMin
{
    protected int|float|Closure|null $min = null;

    public function min(
        int|float|Closure|null $min = null,
    ): int|float|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->min;
        }

        return $this->with(
            'min',
            $min,
        );
    }
}
