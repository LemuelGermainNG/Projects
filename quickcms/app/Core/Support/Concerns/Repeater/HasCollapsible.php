<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Repeater;

use Closure;

trait HasCollapsible
{
    protected bool|Closure $collapsible = false;

    public function collapsible(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'collapsible',
            $enabled,
        );
    }

    public function isCollapsible(): bool|Closure
    {
        return $this->collapsible;
    }
}
