<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasDisabled
{
    protected bool|Closure $disabled = false;

    public function disabled(
        bool|Closure $disabled = true,
    ): static {
        return $this->with(
            'disabled',
            $disabled,
        );
    }

    public function enabled(): static
    {
        return $this->disabled(false);
    }

    public function isDisabled(): bool|Closure
    {
        return $this->disabled;
    }
}
