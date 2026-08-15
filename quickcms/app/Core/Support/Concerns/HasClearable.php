<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasClearable
{
    protected bool|Closure|null $clearable = null;

    public function clearable(
        bool|Closure $value = true,
    ): static {
        return $this->with(
            'clearable',
            $value,
        );
    }

    public function isClearable(): bool|Closure|null
    {
        return $this->clearable;
    }
}
