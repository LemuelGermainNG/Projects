<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Color;

use Closure;

trait HasSwatches
{
    protected bool|Closure $swatches = false;

    public function swatches(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'swatches',
            $enabled,
        );
    }

    public function isSwatches(): bool|Closure
    {
        return $this->swatches;
    }
}
