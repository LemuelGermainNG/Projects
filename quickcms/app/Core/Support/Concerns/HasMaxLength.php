<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasMaxLength
{
    protected int|Closure|null $maxLength = null;

    public function maxLength(
        int|Closure|null $maxLength = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->maxLength;
        }

        return $this->with(
            'maxLength',
            $maxLength,
        );
    }
}
