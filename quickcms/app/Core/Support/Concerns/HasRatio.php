<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasRatio
{
    protected int $ratio = 50;

    public function ratio(?int $ratio = null): int|static
    {
        if (func_num_args() === 0) {
            return $this->ratio;
        }

        return $this->with('ratio', $ratio);
    }
}
