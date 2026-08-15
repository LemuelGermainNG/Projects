<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasHidden
{
    protected bool|Closure $hidden = false;

    public function hidden(
        bool|Closure $hidden = true,
    ): static {
        return $this->with(
            'hidden',
            $hidden,
        );
    }

    public function isHidden(): bool|Closure
    {
        return $this->hidden;
    }

    public function visible(): static
    {
        return $this->hidden(false);
    }
}
