<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasCollection
{
    protected string|Closure|null $collection = null;

    public function collection(
        string|Closure|null $collection = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->collection;
        }

        return $this->with(
            'collection',
            $collection,
        );
    }
}
