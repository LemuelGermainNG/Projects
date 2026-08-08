<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\State\Concerns;

use Closure;

trait HasDefault
{
    protected mixed $default = null;

    public function default(
        mixed $value,
    ): static {
        return $this->with(
            'default',
            $value,
        );
    }

    public function defaultValue(): mixed
    {
        return $this->default;
    }

    public function hasDefault(): bool
    {
        return $this->default !== null;
    }

    public function defaultIsDynamic(): bool
    {
        return $this->default instanceof Closure;
    }
}
