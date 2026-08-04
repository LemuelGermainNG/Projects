<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasSource
{
    protected string|Closure|null $source = null;

    public function source(
        string|Closure|null $source = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->source;
        }

        return $this->with(
            'source',
            $source,
        );
    }
}
