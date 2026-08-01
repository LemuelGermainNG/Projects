<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasSpanLg
{
    protected ?int $spanLg = null;

    public function spanLg(?int $span = null): int|static|null
    {
        if (func_num_args() === 0) {
            return $this->spanLg;
        }

        return $this->with('spanLg', $span);
    }
}
