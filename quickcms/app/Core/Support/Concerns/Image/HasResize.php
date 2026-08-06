<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Image;

use Closure;

trait HasResize
{
    protected array|Closure|null $resize = null;

    public function resize(
        array|Closure|null $resize = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->resize;
        }

        return $this->with(
            'resize',
            $resize,
        );
    }
}
