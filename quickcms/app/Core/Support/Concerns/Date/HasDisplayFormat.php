<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;

trait HasDisplayFormat
{
    protected string|Closure|null $displayFormat = null;

    public function displayFormat(
        string|Closure|null $format = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->displayFormat;
        }

        return $this->with(
            'displayFormat',
            $format,
        );
    }
}
