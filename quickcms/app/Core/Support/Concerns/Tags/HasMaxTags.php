<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Tags;

use Closure;

trait HasMaxTags
{
    protected int|Closure|null $maxTags = null;

    public function maxTags(
        int|Closure|null $max = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->maxTags;
        }

        return $this->with(
            'maxTags',
            $max,
        );
    }
}
