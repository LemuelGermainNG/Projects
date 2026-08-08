<?php

declare(strict_types=1);

namespace Tests\Support\Builders\State;

use App\Core\Schema\Form\State\StateSchema;

final class StateBuilderFactory
{
    public static function make(): StateSchema
    {
        return StateSchema::make()
            ->path('name')
            ->default('John Doe')
            ->live()
            ->reactive()
            ->persist()
            ->dehydrated()
            ->hydrate(
                fn (mixed $value): string => trim((string) $value),
            )
            ->afterHydrate(
                fn (mixed $value): mixed => $value,
            )
            ->afterUpdate(
                fn (mixed $value): mixed => $value,
            )
            ->beforeDehydrate(
                fn (mixed $value): mixed => $value,
            )
            ->dehydrate(
                fn (mixed $value): string => mb_strtolower((string) $value),
            );
    }

    public static function default(): StateSchema
    {
        return StateSchema::make()
            ->default('John Doe');
    }

    public static function dynamicDefault(): StateSchema
    {
        return StateSchema::make()
            ->default(
                fn (): string => 'John Doe',
            );
    }

    public static function path(): StateSchema
    {
        return StateSchema::make()
            ->path('user.name');
    }

    public static function callbacks(): StateSchema
    {
        return StateSchema::make()
            ->hydrate(
                fn (mixed $value): string => trim((string) $value),
            )
            ->afterHydrate(
                fn (mixed $value): mixed => $value,
            )
            ->afterUpdate(
                fn (mixed $value): mixed => $value,
            )
            ->beforeDehydrate(
                fn (mixed $value): mixed => $value,
            )
            ->dehydrate(
                fn (mixed $value): string => mb_strtolower((string) $value),
            );
    }

    public static function live(): StateSchema
    {
        return StateSchema::make()
            ->live();
    }

    public static function reactive(): StateSchema
    {
        return StateSchema::make()
            ->reactive();
    }

    public static function persist(): StateSchema
    {
        return StateSchema::make()
            ->persist();
    }

    public static function dehydrated(): StateSchema
    {
        return StateSchema::make()
            ->dehydrated();
    }

    public static function notDehydrated(): StateSchema
    {
        return StateSchema::make()
            ->dehydrated(false);
    }
}
