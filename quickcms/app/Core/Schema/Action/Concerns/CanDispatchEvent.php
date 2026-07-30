<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Concerns;

trait CanDispatchEvent
{
    /**
     * Event name.
     */
    protected ?string $event = null;

    /**
     * Get or set the event name.
     */
    public function event(?string $event = null): string|static|null
    {
        if ($event === null) {
            return $this->event;
        }

        $this->event = $event;

        return $this;
    }
}
