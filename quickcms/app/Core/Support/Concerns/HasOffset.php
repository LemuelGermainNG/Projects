<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasOffset
{
    protected int $offset = 0;

    public function offset(?int $offset = null): int|static
    {
        if (func_num_args() === 0) {
            return $this->offset;
        }

        return $this->with('offset', $offset);
    }
}
