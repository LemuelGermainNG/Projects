<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\RichEditor;

use Closure;

trait HasComments
{
    protected bool|Closure $comments = false;

    public function comments(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'comments',
            $enabled,
        );
    }

    public function isComments(): bool|Closure
    {
        return $this->comments;
    }
}
