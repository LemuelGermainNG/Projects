<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasRows
{
    protected int|Closure|null $rows = null;

    public function rows(
        int|Closure|null $rows = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->rows;
        }

        return $this->with(
            'rows',
            $rows,
        );
    }
}
