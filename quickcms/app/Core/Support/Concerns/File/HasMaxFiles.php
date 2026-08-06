<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasMaxFiles
{
    protected int|Closure|null $maxFiles = null;

    public function maxFiles(
        int|Closure|null $maxFiles = null,
    ): int|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->maxFiles;
        }

        return $this->with(
            'maxFiles',
            $maxFiles,
        );
    }
}
