<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasVisible
{
    protected bool|Closure $visible = true;

    public function visible(
        bool|Closure|null $visible = null,
    ): bool|Closure|static {
        if (func_num_args() === 0) {
            return $this->visible;
        }

        return $this->with('visible', $visible);
    }

    public function isVisible(): bool
    {
        return (bool) $this->visible;
    }
}
