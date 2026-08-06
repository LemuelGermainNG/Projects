<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasVisibility
{
    protected string|Closure|null $visibility = null;

    public function visibility(
        string|Closure|null $visibility = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->visibility;
        }

        return $this->with(
            'visibility',
            $visibility,
        );
    }
}
