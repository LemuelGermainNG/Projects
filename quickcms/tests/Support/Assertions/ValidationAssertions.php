<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class ValidationAssertions
{
    public static function make(): array
    {
        return [
            'rules' => [

                [
                    'type' => 'required',
                ],

                [
                    'type' => 'min',

                    'parameters' => [
                        'value' => 3,
                    ],
                ],

                [
                    'type' => 'max',

                    'parameters' => [
                        'value' => 255,
                    ],
                ],
            ],
        ];
    }

    public static function email(): array
    {
        return [
            'rules' => [

                [
                    'type' => 'required',
                ],

                [
                    'type' => 'email',
                ],
            ],
        ];
    }

    public static function unique(): array
    {
        return [
            'rules' => [

                [
                    'type' => 'required',
                ],

                [
                    'type' => 'email',
                ],

                [
                    'type' => 'unique',

                    'parameters' => [
                        'model' => \App\Models\User::class,
                        'column' => 'email',
                    ],
                ],
            ],
        ];
    }
}
