<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasMaxSize
{
    protected int|Closure|null $maxSize = null;

    public function maxSize(
        int|Closure|null $size = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->maxSize;
        }

        return $this->with(
            'maxSize',
            $size,
        );
    }
}
