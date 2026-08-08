<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State\Concerns;

use Closure;

trait HasAfterUpdate
{
    protected Closure|null $afterUpdate = null;

    public function afterUpdate(
        Closure $callback,
    ): static {
        return $this->with(
            'afterUpdate',
            $callback,
        );
    }

    public function afterUpdateCallback(): ?Closure
    {
        return $this->afterUpdate;
    }

    public function runAfterUpdate(
        mixed $value,
    ): mixed {
        $callback = $this->afterUpdate;

        if ($callback === null) {
            return $value;
        }

        return $callback($value);
    }
}
