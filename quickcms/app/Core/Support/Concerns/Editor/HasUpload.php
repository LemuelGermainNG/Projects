<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Editor;

use Closure;

trait HasUpload
{
    protected bool|Closure $upload = false;

    public function upload(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'upload',
            $enabled,
        );
    }

    public function isUpload(): bool|Closure
    {
        return $this->upload;
    }
}
