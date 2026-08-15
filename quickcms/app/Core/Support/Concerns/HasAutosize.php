<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasAutosize
{
    protected bool|Closure|null $autosize = null;

    public function autosize(
        bool|Closure $value = true,
    ): static {
        return $this->with(
            'autosize',
            $value,
        );
    }

    public function isAutosize(): bool|Closure|null
    {
        return $this->autosize;
    }
}
