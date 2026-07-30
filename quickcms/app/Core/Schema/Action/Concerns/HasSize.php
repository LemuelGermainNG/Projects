<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Concerns;

use App\Core\Schema\Action\Enums\ActionSize;

trait HasSize
{
    /**
     * Action size.
     */
    protected ActionSize $size = ActionSize::Medium;

    /**
     * Get or set the action size.
     */
    public function size(
        ?ActionSize $size = null,
    ): ActionSize|static {
        if ($size === null) {
            return $this->size;
        }

        $this->size = $size;

        return $this;
    }
}
