<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasOnColor
{
    protected string|Closure|null $onColor = null;

    public function onColor(
        string|Closure|null $color = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->onColor;
        }

        return $this->with(
            'onColor',
            $color,
        );
    }
}
