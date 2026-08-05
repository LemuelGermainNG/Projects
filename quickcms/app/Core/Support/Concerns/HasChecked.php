<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasChecked
{
    protected bool|Closure $checked = false;

    public function checked(
        bool|Closure $checked = true,
    ): static {
        return $this->with(
            'checked',
            $checked,
        );
    }

    public function isChecked(): bool|Closure
    {
        return $this->checked;
    }
}
