<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasSpan
{
    protected int $span = 12;

    public function span(?int $span = null): int|static
    {
        if (func_num_args() === 0) {
            return $this->span;
        }

        return $this->with('span', $span);
    }
}
