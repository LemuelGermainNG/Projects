<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\KeyValue;

use Closure;

trait HasEditableKeys
{
    protected bool|Closure $editableKeys = true;

    public function editableKeys(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('editableKeys', $enabled);
    }

    public function isEditableKeys(): bool|Closure
    {
        return $this->editableKeys;
    }
}
