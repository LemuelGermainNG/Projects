<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;

trait HasFormat
{
    protected string|Closure|null $format = null;

    public function format(
        string|Closure|null $format = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->format;
        }

        return $this->with(
            'format',
            $format,
        );
    }
}
