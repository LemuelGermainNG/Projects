<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State\Concerns;

use Closure;

trait HasLive
{
    protected bool|Closure $live = false;

    public function live(
        bool|Closure $live = true,
    ): static {
        return $this->with(
            'live',
            $live,
        );
    }

    public function isLive(): bool|Closure
    {
        return $this->live;
    }
}
