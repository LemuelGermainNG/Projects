<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasPreserveFilenames
{
    protected bool|Closure $preserveFilenames = false;

    public function preserveFilenames(
        bool|Closure $preserve = true,
    ): static {
        return $this->with(
            'preserveFilenames',
            $preserve,
        );
    }

    public function isPreserveFilenames(): bool|Closure
    {
        return $this->preserveFilenames;
    }
}
