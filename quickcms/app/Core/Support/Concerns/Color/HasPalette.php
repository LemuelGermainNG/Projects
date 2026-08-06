<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Color;

use Closure;

trait HasPalette
{
    protected array|Closure|null $palette = null;

    public function palette(
        array|Closure|null $palette = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->palette;
        }

        return $this->with(
            'palette',
            $palette,
        );
    }
}
