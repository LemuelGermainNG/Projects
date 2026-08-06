<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasDirectory
{
    protected string|Closure|null $directory = null;

    public function directory(
        string|Closure|null $directory = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->directory;
        }

        return $this->with(
            'directory',
            $directory,
        );
    }
}
