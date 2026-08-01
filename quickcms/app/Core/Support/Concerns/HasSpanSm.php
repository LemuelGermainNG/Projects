<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasSpanSm
{
    protected ?int $spanSm = null;

    public function spanSm(?int $span = null): int|static|null
    {
        if (func_num_args() === 0) {
            return $this->spanSm;
        }

        return $this->with('spanSm', $span);
    }
}
