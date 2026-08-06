<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasImageEditor
{
    protected bool|Closure $imageEditor = false;

    public function imageEditor(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'imageEditor',
            $enabled,
        );
    }

    public function isImageEditor(): bool|Closure
    {
        return $this->imageEditor;
    }
}
