<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasAutosize
{
    protected bool|Closure|null $autosize = null;

    public function autosize(
        bool|Closure|null $autosize = null,
    ): bool|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->autosize;
        }

        return $this->with(
            'autosize',
            $autosize,
        );
    }
}
