<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Support\Enum\Target;

trait HasTarget
{
    /**
     *  target.
     */
    protected Target $target = Target::Self;

    /**
     * Get or set the  target.
     */
    public function target(?Target $target = null): Target|static
    {
        if ($target === null) {
            return $this->target;
        }

        return $this->with('target', $target);
    }
}
