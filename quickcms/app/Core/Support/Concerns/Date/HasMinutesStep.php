<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;

trait HasMinutesStep
{
    protected int|Closure|null $minutesStep = null;

    public function minutesStep(
        int|Closure|null $step = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->minutesStep;
        }

        return $this->with(
            'minutesStep',
            $step,
        );
    }
}
