<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Validation\Validation;
use App\Models\User;

final class ValidationBuilderFactory
{
    public static function make(): Validation
    {
        return Validation::make()
            ->required()
            ->min(3)
            ->max(255);
    }

    public static function email(): Validation
    {
        return Validation::make()
            ->required()
            ->email();
    }

    public static function unique(): Validation
    {
        return Validation::make()
            ->required()
            ->email()
            ->unique(
                User::class,
                'email',
            );
    }
}
