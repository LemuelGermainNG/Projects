<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasOffColor
{
    protected string|Closure|null $offColor = null;

    public function offColor(
        string|Closure|null $color = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->offColor;
        }

        return $this->with(
            'offColor',
            $color,
        );
    }
}
