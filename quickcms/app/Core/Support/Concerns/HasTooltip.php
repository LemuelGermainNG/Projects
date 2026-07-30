<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasTooltip
{
    /**
     * Schema tooltip.
     */
    protected ?string $tooltip = null;

    /**
     * Get or set the schema tooltip.
     */
    public function tooltip(?string $tooltip = null): string|static|null
    {
        if ($tooltip === null) {
            return $this->tooltip;
        }

        $this->tooltip = $tooltip;

        return $this;
    }
}
