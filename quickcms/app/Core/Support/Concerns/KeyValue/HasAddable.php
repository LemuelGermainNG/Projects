<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\KeyValue;

use Closure;

trait HasAddable
{
    protected bool|Closure $addable = true;

    public function addable(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('addable', $enabled);
    }

    public function isAddable(): bool|Closure
    {
        return $this->addable;
    }
}
