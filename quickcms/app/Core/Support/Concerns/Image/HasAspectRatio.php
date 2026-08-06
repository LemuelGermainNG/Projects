<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Image;

use Closure;

trait HasAspectRatio
{
    protected string|Closure|null $aspectRatio = null;

    public function aspectRatio(
        string|Closure|null $ratio = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->aspectRatio;
        }

        return $this->with(
            'aspectRatio',
            $ratio,
        );
    }
}
