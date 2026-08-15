<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasMultiple
{
    protected bool|Closure|null $multiple = null;

    public function multiple(
        bool|Closure $value = true,
    ): static {
        return $this->with(
            'multiple',
            $value,
        );
    }

    public function isMultiple(): bool|Closure|null
    {
        return $this->multiple;
    }
}
