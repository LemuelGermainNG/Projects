<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasLength
{
    protected int|Closure|null $length = null;

    public function length(
        int|Closure|null $length = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->length;
        }

        return $this->with(
            'length',
            $length,
        );
    }
}
