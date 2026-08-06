<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Editor;

use Closure;

trait HasMaxHeight
{
    protected int|string|Closure|null $maxHeight = null;

    public function maxHeight(
        int|string|Closure|null $height = null,
    ): int|string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->maxHeight;
        }

        return $this->with(
            'maxHeight',
            $height,
        );
    }
}
