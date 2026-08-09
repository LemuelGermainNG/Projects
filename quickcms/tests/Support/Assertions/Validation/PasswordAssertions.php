<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class PasswordAssertions
{
    public static function default(): array
    {
        return [
            [
                'type' => 'password',

                'parameters' => [
                    'min' => 8,
                    'letters' => true,
                    'mixedCase' => true,
                    'numbers' => true,
                    'symbols' => false,
                    'uncompromised' => false,
                    'generate' => false,
                    'showStrengthMeter' => true,
                ],
            ],
        ];
    }

    public static function strong(): array
    {
        return [
            [
                'type' => 'password',

                'parameters' => [
                    'min' => 12,
                    'letters' => true,
                    'mixedCase' => true,
                    'numbers' => true,
                    'symbols' => true,
                    'uncompromised' => true,
                    'strength' => 'strong',
                    'generate' => false,
                    'showStrengthMeter' => true,
                    'includeDefaults' => true,
                ],
            ],
        ];
    }

    public static function custom(): array
    {
        return [
            [
                'type' => 'password',

                'parameters' => [
                    'min' => 16,
                    'letters' => true,
                    'mixedCase' => true,
                    'numbers' => true,
                    'symbols' => true,
                    'uncompromised' => true,
                    'strength' => 'very-strong',
                    'generate' => true,
                    'showStrengthMeter' => true,
                ],
            ],
        ];
    }
}
