<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Markdown;

use Closure;

trait HasFrontMatter
{
    protected bool|Closure $frontMatter = false;

    public function frontMatter(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('frontMatter', $enabled);
    }

    public function isFrontMatter(): bool|Closure
    {
        return $this->frontMatter;
    }
}
