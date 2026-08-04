<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasClearable
{
    protected bool|Closure|null $clearable = null;

    public function clearable(
        bool|Closure|null $clearable = null,
    ): bool|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->clearable;
        }

        return $this->with('clearable', $clearable);
    }
}
