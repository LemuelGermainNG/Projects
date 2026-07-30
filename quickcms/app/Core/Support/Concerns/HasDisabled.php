<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasDisabled
{
    protected bool|Closure $disabled = false;

    public function disabled(
        bool|Closure|null $disabled = null,
    ): bool|Closure|static {
        if ($disabled === null) {
            return $this->disabled;
        }

        return $this->with('disabled', $disabled);
    }
}
