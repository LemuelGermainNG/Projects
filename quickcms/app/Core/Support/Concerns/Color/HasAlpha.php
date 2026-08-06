<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Color;

use Closure;

trait HasAlpha
{
    protected bool|Closure $alpha = false;

    public function alpha(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'alpha',
            $enabled,
        );
    }

    public function isAlpha(): bool|Closure
    {
        return $this->alpha;
    }
}
