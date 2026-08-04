<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasSortable
{
    protected bool $sortable = false;

    public function sortable(bool $condition = true): bool|static
    {
        if (func_num_args() === 0) {
            return $this->sortable;
        }

        return $this->with('sortable', $condition);
    }

    public function unsortable(): static
    {
        return $this->sortable(false);
    }
}
