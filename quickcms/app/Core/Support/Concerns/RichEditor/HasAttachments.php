<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\RichEditor;

use Closure;

trait HasAttachments
{
    protected bool|Closure $attachments = false;

    public function attachments(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'attachments',
            $enabled,
        );
    }

    public function isAttachments(): bool|Closure
    {
        return $this->attachments;
    }
}
