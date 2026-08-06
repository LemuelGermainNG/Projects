<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class HiddenAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'hidden',

            'value' => 15,
        ];
    }
}
