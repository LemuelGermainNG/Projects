<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasOptimize
{
    protected bool|Closure $optimize = false;

    public function optimize(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'optimize',
            $enabled,
        );
    }

    public function isOptimize(): bool|Closure
    {
        return $this->optimize;
    }
}
