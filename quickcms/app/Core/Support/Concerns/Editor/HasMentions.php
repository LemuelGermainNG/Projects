<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Editor;

use Closure;

trait HasMentions
{
    protected bool|Closure $mentions = false;

    public function mentions(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'mentions',
            $enabled,
        );
    }

    public function isMentions(): bool|Closure
    {
        return $this->mentions;
    }
}
