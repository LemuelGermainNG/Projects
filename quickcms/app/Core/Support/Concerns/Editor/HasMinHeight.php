<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Editor;

use Closure;

trait HasMinHeight
{
    protected int|string|Closure|null $minHeight = null;

    public function minHeight(
        int|string|Closure|null $height = null,
    ): int|string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->minHeight;
        }

        return $this->with(
            'minHeight',
            $height,
        );
    }
}
