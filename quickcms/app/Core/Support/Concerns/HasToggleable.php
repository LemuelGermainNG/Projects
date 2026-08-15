<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasToggleable
{
    protected bool|Closure $toggleable = false;

    public function toggleable(bool|Closure $condition = true): static
    {
        return $this->with('toggleable', $condition);
    }

    public function isToggleable(): bool|Closure
    {
        return $this->toggleable;
    }

    public function untoggleable(): static
    {
        return $this->toggleable(false);
    }
}
