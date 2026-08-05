<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class OptionAssertions
{
    public static function make(
        string|int|bool|null $value,
        string $label,
        array $extra = [],
    ): array {
        return array_replace([
            'type' => 'option',

            'value' => $value,

            'label' => $label,

            'disabled' => false,

            'description' => '',

            'props' => [],
        ], $extra);
    }

    public static function administrator(): array
    {
        return self::make(
            'admin',
            'Administrator',
        );
    }

    public static function user(): array
    {
        return self::make(
            'user',
            'User',
        );
    }
}
