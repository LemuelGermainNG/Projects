<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;

trait HasTimezone
{
    protected string|Closure|null $timezone = null;

    public function timezone(
        string|Closure|null $timezone = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->timezone;
        }

        return $this->with(
            'timezone',
            $timezone,
        );
    }
}
