<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasOnIcon
{
    protected string|Closure|null $onIcon = null;

    public function onIcon(
        string|Closure|null $icon = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->onIcon;
        }

        return $this->with(
            'onIcon',
            $icon,
        );
    }
}
