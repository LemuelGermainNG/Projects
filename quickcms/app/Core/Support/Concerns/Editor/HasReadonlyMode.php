<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Editor;

use Closure;

trait HasReadonlyMode
{
    protected bool|Closure $readonlyMode = false;

    public function readonlyMode(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'readonlyMode',
            $enabled,
        );
    }

    public function isReadonlyMode(): bool|Closure
    {
        return $this->readonlyMode;
    }
}
