<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Repeater;

use Closure;

trait HasMinItems
{
    protected int|Closure|null $minItems = null;

    public function minItems(
        int|Closure|null $items = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->minItems;
        }

        return $this->with(
            'minItems',
            $items,
        );
    }
}
