<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasMinSize
{
    protected int|Closure|null $minSize = null;

    public function minSize(
        int|Closure|null $size = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->minSize;
        }

        return $this->with(
            'minSize',
            $size,
        );
    }
}
