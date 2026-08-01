<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasSpanMd
{
    protected ?int $spanMd = null;

    public function spanMd(?int $span = null): int|static|null
    {
        if (func_num_args() === 0) {
            return $this->spanMd;
        }

        return $this->with('spanMd', $span);
    }
}
