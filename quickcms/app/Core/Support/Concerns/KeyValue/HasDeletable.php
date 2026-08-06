<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\KeyValue;

use Closure;

trait HasDeletable
{
    protected bool|Closure $deletable = true;

    public function deletable(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('deletable', $enabled);
    }

    public function isDeletable(): bool|Closure
    {
        return $this->deletable;
    }
}
