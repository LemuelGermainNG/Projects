<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Tags;

use Closure;

trait HasSuggestions
{
    protected bool|Closure $suggestions = false;

    public function suggestions(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'suggestions',
            $enabled,
        );
    }

    public function isSuggestions(): bool|Closure
    {
        return $this->suggestions;
    }
}
