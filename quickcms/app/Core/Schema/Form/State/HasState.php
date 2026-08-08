<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State;

use Closure;

trait HasState
{
    protected State|Closure|null $state = null;

    public function state(
        State|Closure|null $state,
    ): static {
        return $this->with(
            'state',
            $state,
        );
    }

    public function stateSchema(): State|Closure|null
    {
        return $this->state;
    }

    public function defaultState(
        mixed $value,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= State::make();

        return $this->with(
            'state',
            $state->default($value),
        );
    }

    public function hydrateState(
        Closure $callback,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= State::make();

        return $this->with(
            'state',
            $state->hydrate($callback),
        );
    }

    public function dehydrateState(
        Closure $callback,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= State::make();

        return $this->with(
            'state',
            $state->dehydrate($callback),
        );
    }

    public function hydrateStateValue(
        mixed $value,
    ): mixed {
        $state = $this->state;

        if ($state instanceof Closure || $state === null) {
            return $value;
        }

        return $state->hydrateValue($value);
    }

    public function dehydrateStateValue(
        mixed $value,
    ): mixed {
        $state = $this->state;

        if ($state instanceof Closure || $state === null) {
            return $value;
        }

        return $state->dehydrateValue($value);
    }
}
