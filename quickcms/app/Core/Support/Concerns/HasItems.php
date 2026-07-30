<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasItems
{
    /**
     * @var array
     */
    protected array $items = [];

    public function items(?array $items = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->items;
        }

        return $this->with('items', $items);
    }
}
