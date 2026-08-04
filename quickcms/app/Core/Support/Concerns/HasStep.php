<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasStep
{
    protected int|float|Closure|null $step = null;

    public function step(
        int|float|Closure|null $step = null,
    ): int|float|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->step;
        }

        return $this->with(
            'step',
            $step,
        );
    }
}
