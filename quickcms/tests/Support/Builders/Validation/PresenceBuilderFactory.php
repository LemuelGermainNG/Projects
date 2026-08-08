<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;

final class PresenceBuilderFactory
{
    public static function required(): Validation
    {
        return Validation::make()
            ->required();
    }

    public static function nullable(): Validation
    {
        return Validation::make()
            ->nullable();
    }

    public static function accepted(): Validation
    {
        return Validation::make()
            ->accepted();
    }

    public static function declined(): Validation
    {
        return Validation::make()
            ->declined();
    }
}
