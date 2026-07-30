<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasUrl
{
    /**
     * Schema URL.
     */
    protected ?string $url = null;

    /**
     * Get or set the schema URL.
     */
    public function url(?string $url = null): string|static|null
    {
        if ($url === null) {
            return $this->url;
        }

        $this->url = $url;

        return $this;
    }
}
