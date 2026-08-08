<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

use App\Models\User;

final class DatabaseAssertions
{
    public static function unique(): array
    {
        return [[
            'type' => 'unique',

            'parameters' => [
                'model' => User::class,

                'column' => 'email',
            ],
        ]];
    }

    public static function exists(): array
    {
        return [[
            'type' => 'exists',

            'parameters' => [
                'model' => User::class,

                'column' => 'email',
            ],
        ]];
    }
}
