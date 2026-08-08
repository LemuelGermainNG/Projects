<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State;

use App\Core\Schema\Schema;
use Closure;

final class State extends Schema
{
    protected string|Closure|null $path = null;

    protected mixed $default = null;

    protected Closure|null $hydrate = null;

    protected Closure|null $dehydrate = null;

    public function path(
        string|Closure|null $path,
    ): static {
        return $this->with(
            'path',
            $path,
        );
    }

    public function default(
        mixed $value,
    ): static {
        return $this->with(
            'default',
            $value,
        );
    }

    public function hydrate(
        Closure $callback,
    ): static {
        return $this->with(
            'hydrate',
            $callback,
        );
    }

    public function dehydrate(
        Closure $callback,
    ): static {
        return $this->with(
            'dehydrate',
            $callback,
        );
    }

    public function statePath(): string|Closure|null
    {
        return $this->path;
    }

    public function defaultValue(): mixed
    {
        return $this->default;
    }

    public function hydrateCallback(): ?Closure
    {
        return $this->hydrate;
    }

    public function dehydrateCallback(): ?Closure
    {
        return $this->dehydrate;
    }

    public function hydrateValue(
        mixed $value,
    ): mixed {
        $callback = $this->hydrate;

        if ($callback === null) {
            return $value;
        }

        return $callback($value);
    }

    public function dehydrateValue(
        mixed $value,
    ): mixed {
        $callback = $this->dehydrate;

        if ($callback === null) {
            return $value;
        }

        return $callback($value);
    }
}
