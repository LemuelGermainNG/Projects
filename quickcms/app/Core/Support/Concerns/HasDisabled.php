<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasDisabled
{
    protected bool|Closure $disabled = false;

    public function disabled(
        bool|Closure|null $disabled = null,
    ): bool|Closure|static {
        if (func_num_args() === 0) {
            return $this->disabled;
        }

        return $this->with(
            'disabled',
            $disabled,
        );
    }

    public function enabled(): static
    {
        return $this->disabled(false);
    }

    public function isDisabled(): bool
    {
        return (bool) $this->disabled;
    }
}
