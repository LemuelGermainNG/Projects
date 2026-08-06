<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Repeater;

use Closure;

trait HasMaxItems
{
    protected int|Closure|null $maxItems = null;

    public function maxItems(
        int|Closure|null $items = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->maxItems;
        }

        return $this->with(
            'maxItems',
            $items,
        );
    }
}
