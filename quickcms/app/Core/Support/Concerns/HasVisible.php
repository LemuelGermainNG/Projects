<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasVisible
{
    protected bool|Closure $visible = true;

    public function visible(
        bool|Closure $visible = true,
    ): static {
        return $this->with(
            'visible',
            $visible,
        );
    }

    public function isVisible(): bool|Closure
    {
        return $this->visible;
    }

    public function show(): static
    {
        return $this->visible(true);
    }

    public function hide(): static
    {
        return $this->visible(false);
    }
}
