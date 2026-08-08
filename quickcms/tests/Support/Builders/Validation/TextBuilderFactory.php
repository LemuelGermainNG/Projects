<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;

final class TextBuilderFactory
{
    public static function email(): Validation
    {
        return Validation::make()
            ->email();
    }

    public static function regex(): Validation
    {
        return Validation::make()
            ->regex('/^[A-Z]+$/');
    }
}
