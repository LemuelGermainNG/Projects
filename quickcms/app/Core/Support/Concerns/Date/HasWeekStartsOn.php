<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use App\Core\Support\Enum\Date\WeekDay;
use Closure;

trait HasWeekStartsOn
{
    protected WeekDay|Closure|null $weekStartsOn = null;

    public function weekStartsOn(
        WeekDay|Closure|null $day = null,
    ): WeekDay|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->weekStartsOn;
        }

        return $this->with(
            'weekStartsOn',
            $day,
        );
    }
}
