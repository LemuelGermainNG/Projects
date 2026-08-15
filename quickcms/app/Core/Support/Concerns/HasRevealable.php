<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasRevealable
{
    protected bool|Closure|null $revealable = null;

    public function revealable(
        bool|Closure $value = true,
    ): static {
        return $this->with(
            'revealable',
            $value,
        );
    }

    public function isRevealable(): bool|Closure|null
    {
        return $this->revealable;
    }
}
