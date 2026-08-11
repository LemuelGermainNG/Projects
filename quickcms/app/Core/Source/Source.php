<?php

declare(strict_types=1);

namespace App\Core\Source;

use App\Core\Source\Contracts\Source as SourceContract;
use App\Core\Support\Concerns\EvaluatesValues;

abstract class Source implements SourceContract
{
    use EvaluatesValues;

    public static function make(): static
    {
        return new static();
    }

    public static function name(): string
    {
        return str(class_basename(static::class))
            ->before('Source')
            ->snake()
            ->toString();
    }

    protected function with(
        string $property,
        mixed $value,
    ): static {
        $clone = clone $this;

        $clone->{$property} = $value;

        return $clone;
    }

    abstract public function resolve(
        SourceRequest $request,
    ): SourceResult;
}
