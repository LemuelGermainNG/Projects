<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasMultiple
{
    protected bool|Closure $multiple = false;

    public function multiple(
        bool|Closure $multiple = true,
    ): static {
        return $this->with(
            'multiple',
            $multiple,
        );
    }

    public function isMultiple(): bool|Closure
    {
        return $this->multiple;
    }
}
