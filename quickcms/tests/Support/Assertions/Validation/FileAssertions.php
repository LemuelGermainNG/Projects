<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class FileAssertions
{
    public static function make(): array
    {
        return [
            ...self::file(),
            ...self::mimes(),
            ...self::extensions(),
            ...self::dimensions(),
        ];
    }

    public static function file(): array
    {
        return [
            [
                'type' => 'file',
            ],
        ];
    }

    public static function image(): array
    {
        return [
            [
                'type' => 'image',
            ],
        ];
    }

    public static function mimes(): array
    {
        return [
            [
                'type' => 'mimes',

                'parameters' => [
                    'mimes' => [
                        'jpg',
                        'png',
                        'webp',
                    ],
                ],
            ],
        ];
    }

    public static function extensions(): array
    {
        return [
            [
                'type' => 'extensions',

                'parameters' => [
                    'extensions' => [
                        'jpg',
                        'png',
                        'webp',
                    ],
                ],
            ],
        ];
    }

    public static function dimensions(): array
    {
        return [
            [
                'type' => 'dimensions',

                'parameters' => [
                    'minWidth' => 800,
                    'minHeight' => 600,
                    'maxWidth' => 1920,
                    'maxHeight' => 1080,
                    'ratio' => 16 / 9,
                ],
            ],
        ];
    }
}
