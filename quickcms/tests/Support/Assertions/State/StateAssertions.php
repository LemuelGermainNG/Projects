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
            'hydrate' => true,
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
            'dehydrate' => true,
        ];
    }
}
