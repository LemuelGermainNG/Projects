<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasBadge
{
    protected string|Closure|null $badge = null;

    public function badge(
        string|Closure|null $badge = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->badge;
        }

        return $this->with('badge', $badge);
    }
}
