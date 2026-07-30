<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasVisible
{
    /**
     * Whether the schema is visible.
     */
    protected bool $visible = true;

    /**
     * Get or set whether the schema is visible.
     */
    public function visible(?bool $visible = null): bool|static
    {
        if ($visible === null) {
            return $this->visible;
        }

        $this->visible = $visible;

        return $this;
    }
}
