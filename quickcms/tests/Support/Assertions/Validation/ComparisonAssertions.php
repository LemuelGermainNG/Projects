<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class ComparisonAssertions
{
    public static function make(): array
    {
        return [

            [
                'type' => 'same',

                'parameters' => [
                    'field' => 'password_confirmation',
                ],
            ],

            [
                'type' => 'different',

                'parameters' => [
                    'field' => 'old_password',
                ],
            ],

            [
                'type' => 'in',

                'parameters' => [
                    'values' => [
                        'draft',
                        'published',
                        'archived',
                    ],
                ],
            ],

            [
                'type' => 'not_in',

                'parameters' => [
                    'values' => [
                        'deleted',
                    ],
                ],
            ],

        ];
    }
}
