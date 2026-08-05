<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;
use DateTimeInterface;

trait HasMinDate
{
    protected DateTimeInterface|string|Closure|null $minDate = null;

    public function minDate(
        DateTimeInterface|string|Closure|null $date = null,
    ): DateTimeInterface|string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->minDate;
        }

        return $this->with(
            'minDate',
            $date,
        );
    }
}
