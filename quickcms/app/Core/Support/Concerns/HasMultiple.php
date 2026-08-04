<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasMultiple
{
    protected bool|Closure|null $multiple = null;

    public function multiple(
        bool|Closure|null $multiple = null,
    ): bool|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->multiple;
        }

        return $this->with(
            'multiple',
            $multiple,
        );
    }
}
