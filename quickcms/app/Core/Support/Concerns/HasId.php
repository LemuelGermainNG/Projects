<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasId
{
    /**
     * Schema identifier.
     */
    protected string $id;

    /**
     * Get or set the schema identifier.
     */
    public function id(?string $id = null): string|static
    {
        if ($id === null) {
            return $this->id;
        }

        $this->id = $id;

        return $this;
    }
}
