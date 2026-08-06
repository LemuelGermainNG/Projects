<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\KeyValue;

use Closure;

trait HasKeyLabel
{
    protected string|Closure|null $keyLabel = null;

    public function keyLabel(
        string|Closure|null $label = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->keyLabel;
        }

        return $this->with('keyLabel', $label);
    }
}
