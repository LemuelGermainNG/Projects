<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Password;

final class PasswordDefaults
{
    public static function make(): PasswordParameters
    {
        return PasswordParameters::make()
            ->min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->includeDefaults();
    }

    public static function strong(): PasswordParameters
    {
        return PasswordParameters::make()
            ->min(12)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()
            ->strong()
            ->includeDefaults();
    }
}
