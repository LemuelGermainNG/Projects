<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasAlt
{
    protected string|Closure $alt = '';

    public function alt(
        string|Closure|null $alt = null,
    ): string|Closure|static {
        if ($alt === null) {
            return $this->alt;
        }

        return $this->with('alt', $alt);
    }
}
