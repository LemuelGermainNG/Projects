<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasHeight
{
    protected int|Closure|null $height = null;

    public function height(
        int|Closure|null $height = null,
    ): int|Closure|static|null {
        if (func_num_args() === 0) {
            return $this->height;
        }

        return $this->with('height', $height);
    }
}
