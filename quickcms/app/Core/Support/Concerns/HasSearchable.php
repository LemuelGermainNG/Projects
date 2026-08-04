<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasSearchable
{
    protected bool $searchable = false;

    public function searchable(bool $condition = true): bool|static
    {
        if (func_num_args() === 0) {
            return $this->searchable;
        }

        return $this->with('searchable', $condition);
    }

    public function unsearchable(): static
    {
        return $this->searchable(false);
    }
}
