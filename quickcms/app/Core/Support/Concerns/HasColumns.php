<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasColumns
{
    protected int $columns = 12;

    public function columns(?int $columns = null): int|static
    {
        if (func_num_args() === 0) {
            return $this->columns;
        }

        return $this->with('columns', $columns);
    }
}
