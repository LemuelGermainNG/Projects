<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\State;

final class StateAssertions
{
    public static function make(): array
    {
        return [
            'path' => 'name',

            'default' => 'John Doe',

            'live' => true,

            'reactive' => true,

            'persist' => true,

            'hydrate' => true,

            'afterHydrate' => true,

            'afterUpdate' => true,

            'beforeDehydrate' => true,

            'dehydrate' => true,
        ];
    }

    public static function default(): array
    {
        return [
            'default' => 'John Doe',
        ];
    }

    public static function path(): array
    {
        return [
            'path' => 'user.name',
        ];
    }

    public static function callbacks(): array
    {
        return [
            'hydrate' => true,

            'afterHydrate' => true,

            'afterUpdate' => true,

            'beforeDehydrate' => true,

            'dehydrate' => true,
        ];
    }

    public static function live(): array
    {
        return [
            'live' => true,
        ];
    }

    public static function reactive(): array
    {
        return [
            'reactive' => true,
        ];
    }

    public static function persist(): array
    {
        return [
            'persist' => true,
        ];
    }

    public static function dehydrated(): array
    {
        return [];
    }

    public static function notDehydrated(): array
    {
        return [
            'dehydrated' => false,
        ];
    }
}
