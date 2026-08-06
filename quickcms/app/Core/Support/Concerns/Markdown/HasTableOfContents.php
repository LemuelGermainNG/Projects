<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Markdown;

use Closure;

trait HasTableOfContents
{
    protected bool|Closure $tableOfContents = false;

    public function tableOfContents(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('tableOfContents', $enabled);
    }

    public function isTableOfContents(): bool|Closure
    {
        return $this->tableOfContents;
    }
}
