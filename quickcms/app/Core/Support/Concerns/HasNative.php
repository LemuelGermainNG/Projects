<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasNative
{
    protected bool|Closure|null $native = null;

    public function native(
        bool|Closure $value = true,
    ): static {
        return $this->with(
            'native',
            $value,
        );
    }

    public function isNative(): bool|Closure|null
    {
        return $this->native;
    }
}
