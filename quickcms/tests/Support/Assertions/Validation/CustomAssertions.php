<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class CustomAssertions
{
    public static function make(): array
    {
        return [
            [
                'type' => 'custom',

                'parameters' => [
                    'name' => 'slug_unique',

                    'arguments' => [
                        'locale' => true,
                        'ignoreCurrent' => true,
                    ],
                ],
            ],
        ];
    }
}
