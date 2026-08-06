<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasPreviewable
{
    protected bool|Closure $previewable = false;

    public function previewable(
        bool|Closure $previewable = true,
    ): static {
        return $this->with(
            'previewable',
            $previewable,
        );
    }

    public function isPreviewable(): bool|Closure
    {
        return $this->previewable;
    }
}
