<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\RichEditor;

use Closure;

trait HasCollaboration
{
    protected bool|Closure $collaboration = false;

    public function collaboration(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'collaboration',
            $enabled,
        );
    }

    public function isCollaboration(): bool|Closure
    {
        return $this->collaboration;
    }
}
