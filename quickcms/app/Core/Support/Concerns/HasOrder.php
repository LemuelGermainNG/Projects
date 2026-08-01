<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasOrder
{
    protected int $order = 0;

    public function order(?int $order = null): int|static
    {
        if (func_num_args() === 0) {
            return $this->order;
        }

        return $this->with('order', $order);
    }
}
