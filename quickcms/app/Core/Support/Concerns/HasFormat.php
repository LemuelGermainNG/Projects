<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Enum\Color\ColorFormat;
use Closure;

trait HasFormat
{
    protected ColorFormat|Closure|null $format = null;

    public function format(
        ColorFormat|Closure|null $format = null,
    ): ColorFormat|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->format;
        }

        return $this->with(
            'format',
            $format,
        );
    }
}
