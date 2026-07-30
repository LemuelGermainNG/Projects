<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasTooltip
{
    protected string|Closure|null $tooltip = null;

    public function tooltip(
        string|Closure|null $tooltip = null,
    ): string|Closure|static|null {
        if ($tooltip === null) {
            return $this->tooltip;
        }

        return $this->with('tooltip', $tooltip);
    }
}
