<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Rule\Password\PasswordParameters;
use App\Core\Schema\Form\Validation\Validation;

final class PasswordBuilderFactory
{
    public static function strong(): Validation
    {
        return Validation::make()
            ->strongPassword();
    }

    public static function custom(): Validation
    {
        return Validation::make()
            ->password(
                PasswordParameters::make()
                    ->min(16)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
                    ->veryStrong()
                    ->generate(),
            );
    }
}
