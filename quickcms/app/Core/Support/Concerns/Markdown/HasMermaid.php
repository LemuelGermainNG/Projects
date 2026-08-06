<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Markdown;

use Closure;

trait HasMermaid
{
    protected bool|Closure $mermaid = false;

    public function mermaid(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('mermaid', $enabled);
    }

    public function isMermaid(): bool|Closure
    {
        return $this->mermaid;
    }
}
