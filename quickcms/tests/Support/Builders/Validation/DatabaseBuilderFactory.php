<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;
use App\Models\User;

final class DatabaseBuilderFactory
{
    public static function unique(): Validation
    {
        return Validation::make()
            ->unique(
                User::class,
                'email',
            );
    }

    public static function exists(): Validation
    {
        return Validation::make()
            ->exists(
                User::class,
                'email',
            );
    }

    public static function make(): Validation
    {
        return Validation::make()
            ->exists(
                User::class,
                'email',
            )
            ->unique(
                User::class,
                'email',
            );
    }
}
