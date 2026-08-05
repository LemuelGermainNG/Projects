<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;
use DateTimeInterface;

trait HasMaxDate
{
    protected DateTimeInterface|string|Closure|null $maxDate = null;

    public function maxDate(
        DateTimeInterface|string|Closure|null $date = null,
    ): DateTimeInterface|string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->maxDate;
        }

        return $this->with(
            'maxDate',
            $date,
        );
    }
}
