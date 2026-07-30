<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasLabel
{
    protected string|Closure $label = '';

    public function label(
        string|Closure|null $label = null,
    ): string|Closure|static {
        if ($label === null) {
            return $this->label;
        }

        return $this->with('label', $label);
    }
}
