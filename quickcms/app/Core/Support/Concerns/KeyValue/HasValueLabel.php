<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\KeyValue;

use Closure;

trait HasValueLabel
{
    protected string|Closure|null $valueLabel = null;

    public function valueLabel(
        string|Closure|null $label = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->valueLabel;
        }

        return $this->with('valueLabel', $label);
    }
}
