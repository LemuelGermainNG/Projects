<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasRevealable
{
    protected bool|Closure|null $revealable = null;

    public function revealable(
        bool|Closure|null $revealable = null,
    ): bool|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->revealable;
        }

        return $this->with(
            'revealable',
            $revealable,
        );
    }
}
