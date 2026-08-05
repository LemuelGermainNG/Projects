<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;

trait HasSeconds
{
    protected bool|Closure $seconds = false;

    public function seconds(
        bool|Closure $seconds = true,
    ): static {
        return $this->with(
            'seconds',
            $seconds,
        );
    }

    public function isSeconds(): bool|Closure
    {
        return $this->seconds;
    }
}
