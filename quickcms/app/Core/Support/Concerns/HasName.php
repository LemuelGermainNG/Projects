<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasName
{
    protected string|Closure $name = '';

    public function name(
        string|Closure|null $name = null,
    ): string|Closure|static {
        if ($name === null) {
            return $this->name;
        }

        return $this->with('name', $name);
    }
}
