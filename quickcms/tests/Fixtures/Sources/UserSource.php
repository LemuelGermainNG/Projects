<?php

declare(strict_types=1);

namespace Tests\Fixtures\Sources;

use App\Core\Source\Source;

final class UserSource extends Source
{
    public static function model(): string
    {
        return User::class;
    }

    public static function data(): string
    {
        return UserData::class;
    }
}
