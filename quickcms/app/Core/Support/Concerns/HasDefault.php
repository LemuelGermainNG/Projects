<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasDefault
{
    protected mixed $default = null;

    public function default(mixed $default = null): mixed
    {
        if (func_num_args() === 0) {
            return $this->default;
        }

        return $this->with('default', $default);
    }
}
