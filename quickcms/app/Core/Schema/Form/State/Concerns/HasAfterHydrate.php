<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State\Concerns;

use Closure;

trait HasAfterHydrate
{
    protected Closure|null $afterHydrate = null;

    public function afterHydrate(
        Closure $callback,
    ): static {
        return $this->with(
            'afterHydrate',
            $callback,
        );
    }

    public function afterHydrateCallback(): ?Closure
    {
        return $this->afterHydrate;
    }

    public function runAfterHydrate(
        mixed $value,
    ): mixed {
        $callback = $this->afterHydrate;

        if ($callback === null) {
            return $value;
        }

        return $callback($value);
    }
}
