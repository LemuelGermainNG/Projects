<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;

trait HasSecondsStep
{
    protected int|Closure|null $secondsStep = null;

    public function secondsStep(
        int|Closure|null $step = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->secondsStep;
        }

        return $this->with(
            'secondsStep',
            $step,
        );
    }
}
