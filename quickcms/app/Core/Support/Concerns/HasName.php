<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasName
{
    /**
     * Schema name.
     */
    protected string $name;

    /**
     * Get or set the schema name.
     */
    public function name(?string $name = null): string|static
    {
        if ($name === null) {
            return $this->name;
        }

        $this->name = $name;

        return $this;
    }
}
