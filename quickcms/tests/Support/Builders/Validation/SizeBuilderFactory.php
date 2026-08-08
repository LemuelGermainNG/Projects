<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;

final class SizeBuilderFactory
{
    public static function min(): Validation
    {
        return Validation::make()->min(3);
    }

    public static function max(): Validation
    {
        return Validation::make()->max(255);
    }

    public static function between(): Validation
    {
        return Validation::make()->between(
            3,
            255,
        );
    }

    public static function decimal(): Validation
    {
        return Validation::make()->decimal(
            2,
            4,
        );
    }

    public static function multipleOf(): Validation
    {
        return Validation::make()->multipleOf(
            0.5,
        );
    }
}
