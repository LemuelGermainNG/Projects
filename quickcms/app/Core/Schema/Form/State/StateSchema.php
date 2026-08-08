<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State;

use App\Core\Schema\Form\State\Concerns\HasAfterHydrate;
use App\Core\Schema\Form\State\Concerns\HasAfterUpdate;
use App\Core\Schema\Form\State\Concerns\HasBeforeDehydrate;
use App\Core\Schema\Form\State\Concerns\HasDefault;
use App\Core\Schema\Form\State\Concerns\HasDehydrated;
use App\Core\Schema\Form\State\Concerns\HasLive;
use App\Core\Schema\Form\State\Concerns\HasPersist;
use App\Core\Schema\Form\State\Concerns\HasReactive;
use App\Core\Schema\Schema;
use Closure;

final class StateSchema extends Schema
{
    use HasAfterHydrate;
    use HasAfterUpdate;
    use HasBeforeDehydrate;
    use HasDefault;
    use HasDehydrated;
    use HasLive;
    use HasPersist;
    use HasReactive;

    protected string|Closure|null $path = null;

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
        if ($this->hydrate !== null) {
            $value = ($this->hydrate)($value);
        }

        return $this->runAfterHydrate($value);
    }

    public function dehydrateValue(
        mixed $value,
    ): mixed {
        $value = $this->runBeforeDehydrate($value);

        if ($this->dehydrate !== null) {
            $value = ($this->dehydrate)($value);
        }

        return $value;
    }

    public function updateValue(
        mixed $value,
    ): mixed {
        return $this->runAfterUpdate($value);
    }
}
