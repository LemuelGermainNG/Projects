<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\KeyValue;

use Closure;

trait HasKeyPlaceholder
{
    protected string|Closure|null $keyPlaceholder = null;

    public function keyPlaceholder(
        string|Closure|null $placeholder = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->keyPlaceholder;
        }

        return $this->with('keyPlaceholder', $placeholder);
    }
}
