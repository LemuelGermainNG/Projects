<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasDescription
{
    protected string|Closure $description = '';

    public function description(
        string|Closure|null $description = null,
    ): string|Closure|static {
        if ($description === null) {
            return $this->description;
        }

        return $this->with('description', $description);
    }
}
