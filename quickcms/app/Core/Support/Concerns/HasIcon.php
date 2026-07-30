<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasIcon
{
    protected string|Closure|null $icon = null;

    public function icon(
        string|Closure|null $icon = null,
    ): string|Closure|static|null {
        if ($icon === null) {
            return $this->icon;
        }

        return $this->with('icon', $icon);
    }
}
