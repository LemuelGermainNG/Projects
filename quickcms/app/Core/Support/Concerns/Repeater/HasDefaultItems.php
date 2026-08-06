<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Repeater;

use Closure;

trait HasDefaultItems
{
    protected int|Closure|null $defaultItems = null;

    public function defaultItems(
        int|Closure|null $items = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->defaultItems;
        }

        return $this->with(
            'defaultItems',
            $items,
        );
    }
}
