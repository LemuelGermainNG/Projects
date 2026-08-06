<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasReorderable
{
    protected bool|Closure $reorderable = false;

    public function reorderable(
        bool|Closure $reorderable = true,
    ): static {
        return $this->with(
            'reorderable',
            $reorderable,
        );
    }

    public function isReorderable(): bool|Closure
    {
        return $this->reorderable;
    }
}
