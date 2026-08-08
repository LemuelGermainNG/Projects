<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasWidth
{
    protected int|Closure|null $width = null;

    public function width(int|Closure|null $width = null): int|Closure|static|null
    {
        if (func_num_args() === 0) {
            return $this->width;
        }

        return $this->with('width', $width);
    }
}
