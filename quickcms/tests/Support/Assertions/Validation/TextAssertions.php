<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class TextAssertions
{
    public static function email(): array
    {
        return [[
            'type' => 'email',
        ]];
    }

    public static function regex(): array
    {
        return [[
            'type' => 'regex',

            'parameters' => [
                'pattern' => '/^[A-Z]+$/',
            ],
        ]];
    }
}
