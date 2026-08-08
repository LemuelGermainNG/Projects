<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class TypeAssertions
{
    public static function string(): array
    {
        return [[
            'type' => 'string',
        ]];
    }

    public static function boolean(): array
    {
        return [[
            'type' => 'boolean',
        ]];
    }

    public static function integer(): array
    {
        return [[
            'type' => 'integer',
        ]];
    }

    public static function numeric(): array
    {
        return [[
            'type' => 'numeric',
        ]];
    }

    public static function array(): array
    {
        return [[
            'type' => 'array',
        ]];
    }

    public static function arrayWithKeys(): array
    {
        return [[
            'type' => 'array',

            'parameters' => [
                'keys' => [
                    'title',
                    'slug',
                    'content',
                ],
            ],
        ]];
    }

    public static function date(): array
    {
        return [[
            'type' => 'date',
        ]];
    }

    public static function file(): array
    {
        return [[
            'type' => 'file',
        ]];
    }

    public static function image(): array
    {
        return [[
            'type' => 'image',
        ]];
    }
}
