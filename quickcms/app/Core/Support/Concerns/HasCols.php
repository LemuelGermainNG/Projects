<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasCols
{
    protected int|Closure|null $cols = null;

    public function cols(
        int|Closure|null $cols = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->cols;
        }

        return $this->with(
            'cols',
            $cols,
        );
    }
}
