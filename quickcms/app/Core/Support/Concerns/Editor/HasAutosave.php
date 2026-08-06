<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Editor;

use Closure;

trait HasAutosave
{
    protected bool|Closure $autosave = false;

    public function autosave(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'autosave',
            $enabled,
        );
    }

    public function isAutosave(): bool|Closure
    {
        return $this->autosave;
    }
}
