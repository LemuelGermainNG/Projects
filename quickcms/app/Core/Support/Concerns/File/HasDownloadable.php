<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasDownloadable
{
    protected bool|Closure $downloadable = false;

    public function downloadable(
        bool|Closure $downloadable = true,
    ): static {
        return $this->with(
            'downloadable',
            $downloadable,
        );
    }

    public function isDownloadable(): bool|Closure
    {
        return $this->downloadable;
    }
}
