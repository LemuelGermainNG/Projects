<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Markdown;

use Closure;

trait HasEmoji
{
    protected bool|Closure $emoji = false;

    public function emoji(
        bool|Closure $enabled = true,
    ): static {
        return $this->with('emoji', $enabled);
    }

    public function isEmoji(): bool|Closure
    {
        return $this->emoji;
    }
}
