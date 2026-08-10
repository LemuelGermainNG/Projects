<?php

declare(strict_types=1);

namespace App\Features\User\Sources;

use App\Core\Source\Source;
use App\Features\User\Data\UserData;
use App\Features\User\Models\User;

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
