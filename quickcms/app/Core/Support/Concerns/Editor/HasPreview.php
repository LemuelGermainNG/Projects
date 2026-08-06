<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Editor;

use Closure;

trait HasPreview
{
    protected bool|Closure $preview = false;

    public function preview(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'preview',
            $enabled,
        );
    }

    public function isPreview(): bool|Closure
    {
        return $this->preview;
    }
}
