<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class DateAssertions
{
    public static function make(): array
    {
        return [

            [
                'type' => 'date',
            ],

            [
                'type' => 'after',

                'parameters' => [
                    'value' => 'today',
                ],
            ],

            [
                'type' => 'before',

                'parameters' => [
                    'value' => '2030-12-31',
                ],
            ],

        ];
    }
}
