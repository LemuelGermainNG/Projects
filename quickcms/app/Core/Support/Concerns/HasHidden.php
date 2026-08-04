<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasHidden
{
    protected bool|Closure $hidden = false;

    public function hidden(bool|Closure $hidden = true): bool|Closure|static
    {
        if (func_num_args() === 0) {
            return $this->hidden;
        }

        return $this->with('hidden', $hidden);
    }

    public function visible(): static
    {
        return $this->hidden(false);
    }
}
