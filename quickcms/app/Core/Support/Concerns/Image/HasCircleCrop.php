<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Image;

use Closure;

trait HasCircleCrop
{
    protected bool|Closure $circleCrop = false;

    public function circleCrop(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'circleCrop',
            $enabled,
        );
    }

    public function isCircleCrop(): bool|Closure
    {
        return $this->circleCrop;
    }
}
