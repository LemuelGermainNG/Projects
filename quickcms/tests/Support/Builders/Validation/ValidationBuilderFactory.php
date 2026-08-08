<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;

final class ValidationBuilderFactory
{
    public static function make(): Validation
    {
        return Validation::make()
            ->required()
            ->string()
            ->min(3)
            ->max(255)
            ->email();
    }
}
