<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasSortable
{
    protected bool|Closure $sortable = false;

    public function sortable(bool|Closure $condition = true): static
    {
        return $this->with('sortable', $condition);
    }

    public function isSortable(): bool|Closure
    {
        return $this->sortable;
    }

    public function unsortable(): static
    {
        return $this->sortable(false);
    }
}
