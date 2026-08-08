<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class SizeAssertions
{
    public static function min(): array
    {
        return [[
            'type' => 'min',

            'parameters' => [
                'value' => 3,
            ],
        ]];
    }

    public static function max(): array
    {
        return [[
            'type' => 'max',

            'parameters' => [
                'value' => 255,
            ],
        ]];
    }

    public static function between(): array
    {
        return [[
            'type' => 'between',

            'parameters' => [
                'min' => 3,
                'max' => 255,
            ],
        ]];
    }

    public static function decimal(): array
    {
        return [[
            'type' => 'decimal',

            'parameters' => [
                'min' => 2,
                'max' => 4,
            ],
        ]];
    }

    public static function multipleOf(): array
    {
        return [[
            'type' => 'multiple_of',

            'parameters' => [
                'value' => 0.5,
            ],
        ]];
    }
}
