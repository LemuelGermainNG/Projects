<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Repeater;

use Closure;

trait HasCloneable
{
    protected bool|Closure $cloneable = false;

    public function cloneable(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'cloneable',
            $enabled,
        );
    }

    public function isCloneable(): bool|Closure
    {
        return $this->cloneable;
    }
}
