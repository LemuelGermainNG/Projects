<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasSearchable
{
    protected bool|Closure $searchable = false;

    public function searchable(bool|Closure $condition = true): static
    {
        return $this->with('searchable', $condition);
    }

    public function isSearchable(): bool|Closure
    {
        return $this->searchable;
    }

    public function unsearchable(): static
    {
        return $this->searchable(false);
    }
}
