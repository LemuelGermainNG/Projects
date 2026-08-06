<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Image;

use Closure;

trait HasImageQuality
{
    protected int|Closure|null $imageQuality = null;

    public function imageQuality(
        int|Closure|null $quality = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->imageQuality;
        }

        return $this->with(
            'imageQuality',
            $quality,
        );
    }
}
