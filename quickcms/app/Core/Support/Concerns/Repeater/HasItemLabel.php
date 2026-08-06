<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Repeater;

use Closure;

trait HasItemLabel
{
    protected string|Closure|null $itemLabel = null;

    public function itemLabel(
        string|Closure|null $label = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->itemLabel;
        }

        return $this->with(
            'itemLabel',
            $label,
        );
    }
}
