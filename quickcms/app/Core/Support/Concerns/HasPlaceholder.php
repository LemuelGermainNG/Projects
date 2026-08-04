<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasPlaceholder
{
    protected string|Closure $placeholder = '';

    public function placeholder(
        string|Closure|null $placeholder = null,
    ): string|Closure|static {
        if (func_num_args() === 0) {
            return $this->placeholder;
        }

        return $this->with(
            'placeholder',
            $placeholder,
        );
    }
}
