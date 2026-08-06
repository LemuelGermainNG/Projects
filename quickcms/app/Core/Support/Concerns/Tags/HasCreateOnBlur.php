<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Tags;

use Closure;

trait HasCreateOnBlur
{
    protected bool|Closure $createOnBlur = false;

    public function createOnBlur(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'createOnBlur',
            $enabled,
        );
    }

    public function isCreateOnBlur(): bool|Closure
    {
        return $this->createOnBlur;
    }
}
