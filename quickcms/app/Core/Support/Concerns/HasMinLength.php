<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasMinLength
{
    protected int|Closure|null $minLength = null;

    public function minLength(
        int|Closure|null $minLength = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->minLength;
        }

        return $this->with(
            'minLength',
            $minLength,
        );
    }
}
