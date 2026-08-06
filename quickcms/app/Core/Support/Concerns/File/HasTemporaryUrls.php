<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasTemporaryUrls
{
    protected bool|Closure $temporaryUrls = false;

    public function temporaryUrls(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'temporaryUrls',
            $enabled,
        );
    }

    public function isTemporaryUrls(): bool|Closure
    {
        return $this->temporaryUrls;
    }
}
