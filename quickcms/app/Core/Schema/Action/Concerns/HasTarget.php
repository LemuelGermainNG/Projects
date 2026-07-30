<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Concerns;

use App\Core\Schema\Action\Enums\ActionTarget;

trait HasTarget
{
    /**
     * Action target.
     */
    protected ActionTarget $target = ActionTarget::Self;

    /**
     * Get or set the action target.
     */
    public function target(
        ?ActionTarget $target = null,
    ): ActionTarget|static {
        if ($target === null) {
            return $this->target;
        }

        $this->target = $target;

        return $this;
    }
}
