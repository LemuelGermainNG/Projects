<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasOffIcon
{
    protected string|Closure|null $offIcon = null;

    public function offIcon(
        string|Closure|null $icon = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->offIcon;
        }

        return $this->with(
            'offIcon',
            $icon,
        );
    }
}
