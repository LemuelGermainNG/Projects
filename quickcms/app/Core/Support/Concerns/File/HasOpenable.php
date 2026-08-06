<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasOpenable
{
    protected bool|Closure $openable = false;

    public function openable(
        bool|Closure $openable = true,
    ): static {
        return $this->with(
            'openable',
            $openable,
        );
    }

    public function isOpenable(): bool|Closure
    {
        return $this->openable;
    }
}
