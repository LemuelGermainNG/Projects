<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasNative
{
    protected bool|Closure|null $native = null;

    public function native(
        bool|Closure|null $native = null,
    ): bool|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->native;
        }

        return $this->with('native', $native);
    }
}
