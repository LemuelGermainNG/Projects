<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasDisk
{
    protected string|Closure|null $disk = null;

    public function disk(
        string|Closure|null $disk = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->disk;
        }

        return $this->with(
            'disk',
            $disk,
        );
    }
}
