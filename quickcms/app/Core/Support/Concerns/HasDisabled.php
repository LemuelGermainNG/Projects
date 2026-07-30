<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasDisabled
{
    /**
     * Whether the schema is disabled.
     */
    protected bool $disabled = false;

    /**
     * Get or set whether the schema is disabled.
     */
    public function disabled(?bool $disabled = null): bool|static
    {
        if ($disabled === null) {
            return $this->disabled;
        }

        $this->disabled = $disabled;

        return $this;
    }
}
