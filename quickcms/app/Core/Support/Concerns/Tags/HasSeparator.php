<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Tags;

use Closure;

trait HasSeparator
{
    protected string|Closure|null $separator = null;

    public function separator(
        string|Closure|null $separator = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->separator;
        }

        return $this->with(
            'separator',
            $separator,
        );
    }
}
