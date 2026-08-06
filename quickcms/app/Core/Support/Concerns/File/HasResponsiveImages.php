<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasResponsiveImages
{
    protected bool|Closure $responsiveImages = false;

    public function responsiveImages(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'responsiveImages',
            $enabled,
        );
    }

    public function isResponsiveImages(): bool|Closure
    {
        return $this->responsiveImages;
    }
}
