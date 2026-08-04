<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasSearch
{
    protected string|array|Closure|null $search = null;

    public function search(
        string|array|Closure|null $search = null,
    ): string|array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->search;
        }

        return $this->with(
            'search',
            $search,
        );
    }
}
