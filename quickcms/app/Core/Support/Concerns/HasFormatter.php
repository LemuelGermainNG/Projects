<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasFormatter
{
    protected ?Closure $formatter = null;

    public function formatter(?Closure $formatter = null): Closure|static|null
    {
        if (func_num_args() === 0) {
            return $this->formatter;
        }

        return $this->with('formatter', $formatter);
    }
}
