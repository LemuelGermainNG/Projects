<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasIcon
{
    /**
     * Schema icon.
     */
    protected ?string $icon = null;

    /**
     * Get or set the schema icon.
     */
    public function icon(?string $icon = null): string|static|null
    {
        if ($icon === null) {
            return $this->icon;
        }

        $this->icon = $icon;

        return $this;
    }
}
