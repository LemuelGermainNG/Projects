<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasInline
{
    protected bool|Closure $inline = false;

    public function inline(
        bool|Closure $inline = true,
    ): static {
        return $this->with(
            'inline',
            $inline,
        );
    }

    public function isInline(): bool|Closure
    {
        return $this->inline;
    }
}
