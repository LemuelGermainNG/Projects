<?php

declare(strict_types=1);

namespace Tests\Support\Builders\State;

use App\Core\Schema\Form\State\State;

final class StateBuilderFactory
{
    public static function make(): State
    {
        return State::make()
            ->path('name')
            ->default('John Doe')
            ->hydrate(
                fn (mixed $value): string => trim((string) $value),
            )
            ->dehydrate(
                fn (mixed $value): string => mb_strtolower((string) $value),
            );
    }

    public static function default(): State
    {
        return State::make()
            ->default('John Doe');
    }

    public static function path(): State
    {
        return State::make()
            ->path('user.name');
    }

    public static function callbacks(): State
    {
        return State::make()
            ->hydrate(
                fn (mixed $value): string => trim((string) $value),
            )
            ->dehydrate(
                fn (mixed $value): string => mb_strtolower((string) $value),
            );
    }
}
