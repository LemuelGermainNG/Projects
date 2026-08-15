<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasReadonly
{
    protected bool|Closure $readonly = false;

    public function readonly(
        bool|Closure $readonly = true,
    ): static {
        return $this->with(
            'readonly',
            $readonly,
        );
    }

    public function writable(): static
    {
        return $this->readonly(false);
    }

    public function isReadonly(): bool|Closure
    {
        return $this->readonly;
    }
}
