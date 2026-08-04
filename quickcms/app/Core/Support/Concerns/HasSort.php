<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasSort
{
    protected string|Closure|null $sort = null;

    public function sort(
        string|Closure|null $sort = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->sort;
        }

        return $this->with(
            'sort',
            $sort,
        );
    }
}
