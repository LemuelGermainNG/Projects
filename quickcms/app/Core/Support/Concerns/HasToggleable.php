<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasToggleable
{
    protected bool $toggleable = false;

    public function toggleable(bool $condition = true): bool|static
    {
        if (func_num_args() === 0) {
            return $this->toggleable;
        }

        return $this->with('toggleable', $condition);
    }

    public function untoggleable(): static
    {
        return $this->toggleable(false);
    }
}
