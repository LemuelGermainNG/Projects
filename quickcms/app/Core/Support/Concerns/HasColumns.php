<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasColumns
{
    protected int|string|array|Closure|null $columns = null;

    public function columns(
        int|string|array|Closure|null $columns = null,
    ): int|string|array|Closure|static|null {
        if ($columns === null) {
            return $this->columns;
        }

        return $this->with(
            'columns',
            $columns,
        );
    }
}
