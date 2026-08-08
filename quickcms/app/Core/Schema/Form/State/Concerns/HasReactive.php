<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State\Concerns;

use Closure;

trait HasReactive
{
    protected bool|Closure $reactive = false;

    public function reactive(
        bool|Closure $reactive = true,
    ): static {
        return $this->with(
            'reactive',
            $reactive,
        );
    }

    public function isReactive(): bool|Closure
    {
        return $this->reactive;
    }
}
