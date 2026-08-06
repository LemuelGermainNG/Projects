<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Markdown;

use Closure;

trait HasSyntaxHighlight
{
    protected bool|Closure $syntaxHighlight = false;

    public function syntaxHighlight(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('syntaxHighlight', $enabled);
    }

    public function isSyntaxHighlight(): bool|Closure
    {
        return $this->syntaxHighlight;
    }
}
