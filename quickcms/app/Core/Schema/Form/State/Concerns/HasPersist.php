<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State\Concerns;

use Closure;

trait HasPersist
{
    protected bool|Closure $persist = false;

    public function persist(
        bool|Closure $persist = true,
    ): static {
        return $this->with(
            'persist',
            $persist,
        );
    }

    public function shouldPersist(): bool|Closure
    {
        return $this->persist;
    }
}
