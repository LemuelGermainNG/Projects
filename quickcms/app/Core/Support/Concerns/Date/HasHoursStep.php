<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;

trait HasHoursStep
{
    protected int|Closure|null $hoursStep = null;

    public function hoursStep(
        int|Closure|null $step = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->hoursStep;
        }

        return $this->with(
            'hoursStep',
            $step,
        );
    }
}
