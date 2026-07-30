<?php

declare(strict_types=1);

namespace App\Core\Schema;

use App\Core\Builder\BuilderRegistry;

abstract class Schema
{
    public static function make(): static
    {
        return new static();
    }

    final public function compile(BuilderRegistry $registry): array
    {
        return $registry->build($this);
    }

    final public function values(): array
    {
        return get_object_vars($this);
    }

    protected function with(string $property,mixed $value): static
    {
        $clone = clone $this;

        $clone->{$property} = $value;

        return $clone;
    }
}
