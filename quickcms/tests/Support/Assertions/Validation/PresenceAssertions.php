<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class PresenceAssertions
{
    public static function required(): array
    {
        return [
            [
                'type' => 'required',
            ],
        ];
    }

    public static function nullable(): array
    {
        return [
            [
                'type' => 'nullable',
            ],
        ];
    }

    public static function accepted(): array
    {
        return [
            [
                'type' => 'accepted',
            ],
        ];
    }

    public static function declined(): array
    {
        return [
            [
                'type' => 'declined',
            ],
        ];
    }
}
