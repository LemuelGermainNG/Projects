<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Form\State\StateSchema;
use Closure;

trait HasState
{
    protected StateSchema|Closure|null $state = null;

    public function state(
        StateSchema|Closure|null $state,
    ): static {
        return $this->with(
            'state',
            $state,
        );
    }

    public function stateSchema(): StateSchema|Closure|null
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

        $state ??= StateSchema::make();

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

        $state ??= StateSchema::make();

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

        $state ??= StateSchema::make();

        return $this->with(
            'state',
            $state->dehydrate($callback),
        );
    }

    public function liveState(
        bool|Closure $live = true,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= StateSchema::make();

        return $this->with(
            'state',
            $state->live($live),
        );
    }

    public function reactiveState(
        bool|Closure $reactive = true,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= StateSchema::make();

        return $this->with(
            'state',
            $state->reactive($reactive),
        );
    }

    public function persistState(
        bool|Closure $persist = true,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= StateSchema::make();

        return $this->with(
            'state',
            $state->persist($persist),
        );
    }

    public function dehydratedState(
        bool|Closure $dehydrated = true,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= StateSchema::make();

        return $this->with(
            'state',
            $state->dehydrated($dehydrated),
        );
    }

    public function beforeDehydrateState(
        Closure $callback,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= StateSchema::make();

        return $this->with(
            'state',
            $state->beforeDehydrate($callback),
        );
    }

    public function afterHydrateState(
        Closure $callback,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= StateSchema::make();

        return $this->with(
            'state',
            $state->afterHydrate($callback),
        );
    }

    public function afterUpdateState(
        Closure $callback,
    ): static {
        $state = $this->state;

        if ($state instanceof Closure) {
            return $this;
        }

        $state ??= StateSchema::make();

        return $this->with(
            'state',
            $state->afterUpdate($callback),
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

        if ($state->shouldDehydrate() === false) {
            return null;
        }

        return $state->dehydrateValue($value);
    }

    public function updateStateValue(
        mixed $value,
    ): mixed {
        $state = $this->state;

        if ($state instanceof Closure || $state === null) {
            return $value;
        }

        return $state->updateValue($value);
    }
}
