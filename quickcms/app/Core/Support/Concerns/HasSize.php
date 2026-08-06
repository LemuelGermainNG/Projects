<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Support\Enum\Size;


trait HasSize
{
    /**
     * size.
     */
    protected Size $size = Size::Medium;

    /**
     * Get or set the  size.
     */
    public function size(?Size $size = null): Size|static
    {
        if ($size === null) {
            return $this->size;
        }

        return $this->with('size', $size);
    }
}
