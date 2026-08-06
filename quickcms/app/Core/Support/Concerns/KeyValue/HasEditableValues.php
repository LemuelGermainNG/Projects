<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\KeyValue;

use Closure;

trait HasEditableValues
{
    protected bool|Closure $editableValues = true;

    public function editableValues(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('editableValues', $enabled);
    }

    public function isEditableValues(): bool|Closure
    {
        return $this->editableValues;
    }
}
