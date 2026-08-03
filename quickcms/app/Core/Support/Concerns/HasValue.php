<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasValue
{
    protected string|int|float|bool|array|Closure|null $value = null;

    public function value(
        string|int|float|bool|array|Closure|null $value = null,
    ): string|int|float|bool|array|Closure|static|null {
        if (func_num_args() === 0) {
            return $this->value;
        }

        return $this->with('value', $value);
    }
}
