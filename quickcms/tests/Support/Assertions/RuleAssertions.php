<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class RuleAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'min',

            'parameters' => [
                'value' => 3,
            ],

            'message' => 'Minimum 3 caractères',
        ];
    }
}
