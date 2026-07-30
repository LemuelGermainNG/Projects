<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasLabel
{
    /**
     * Schema label.
     */
    protected string $label;

    /**
     * Get or set the schema label.
     */
    public function label(?string $label = null): string|static
    {
        if ($label === null) {
            return $this->label;
        }

        $this->label = $label;

        return $this;
    }
}
