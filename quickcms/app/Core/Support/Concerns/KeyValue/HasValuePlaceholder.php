<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\KeyValue;

use Closure;

trait HasValuePlaceholder
{
    protected string|Closure|null $valuePlaceholder = null;

    public function valuePlaceholder(
        string|Closure|null $placeholder = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->valuePlaceholder;
        }

        return $this->with('valuePlaceholder', $placeholder);
    }
}
