<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasReadonly
{
    protected bool|Closure $readonly = false;

    public function readonly(
        bool|Closure|null $readonly = null,
    ): bool|Closure|static {
        if (func_num_args() === 0) {
            return $this->readonly;
        }

        return $this->with(
            'readonly',
            $readonly,
        );
    }

    public function writable(): static
    {
        return $this->with(
            'readonly',
            false,
        );
    }

    public function isReadonly(): bool
    {
        return $this->readonly;
    }
}
