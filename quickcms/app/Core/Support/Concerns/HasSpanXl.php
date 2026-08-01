<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasSpanXl
{
    protected ?int $spanXl = null;

    public function spanXl(?int $span = null): int|static|null
    {
        if (func_num_args() === 0) {
            return $this->spanXl;
        }

        return $this->with('spanXl', $span);
    }
}
