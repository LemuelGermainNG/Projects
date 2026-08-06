<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class ValidationRulesAssertions
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
}
