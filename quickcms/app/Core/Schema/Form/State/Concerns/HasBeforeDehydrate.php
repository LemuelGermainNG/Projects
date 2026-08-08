<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State\Concerns;

use Closure;

trait HasBeforeDehydrate
{
    protected Closure|null $beforeDehydrate = null;

    public function beforeDehydrate(
        Closure $callback,
    ): static {
        return $this->with(
            'beforeDehydrate',
            $callback,
        );
    }

    public function beforeDehydrateCallback(): ?Closure
    {
        return $this->beforeDehydrate;
    }

    public function runBeforeDehydrate(
        mixed $value,
    ): mixed {
        $callback = $this->beforeDehydrate;

        if ($callback === null) {
            return $value;
        }

        return $callback($value);
    }
}
