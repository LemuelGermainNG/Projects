<?php

declare(strict_types=1);

namespace App\Core\Schema;

use App\Core\Builder\BuilderRegistry;
use App\Core\Support\Contracts\EvaluationContextInterface;

abstract class Schema
{
    public static function make(): static
    {
        return new static();
    }

    final public function compile(
        BuilderRegistry $registry,
        ?EvaluationContextInterface $context = null,
    ): array {
        return $registry->build(
            $this,
            $context,
        );
    }

    final public function values(): array
    {
        return get_object_vars($this);
    }

    protected function with(
        string $property,
        mixed $value,
    ): static {
        $clone = clone $this;

        $clone->{$property} = $value;

        return $clone;
    }

    /**
     * @return array<string, mixed>
     */
    public function properties(): array
    {
        return get_object_vars($this);
    }
}
