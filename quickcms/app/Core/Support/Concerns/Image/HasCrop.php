<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Image;

use Closure;

trait HasCrop
{
    protected bool|Closure $crop = false;

    public function crop(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'crop',
            $enabled,
        );
    }

    public function isCrop(): bool|Closure
    {
        return $this->crop;
    }
}
