<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasMask
{
    protected string|Closure|null $mask = null;

    public function mask(
        string|Closure|null $mask = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->mask;
        }

        return $this->with(
            'mask',
            $mask,
        );
    }
}
