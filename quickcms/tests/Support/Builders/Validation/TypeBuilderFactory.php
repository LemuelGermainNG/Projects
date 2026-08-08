<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;

final class TypeBuilderFactory
{
    public static function string(): Validation
    {
        return Validation::make()->string();
    }

    public static function boolean(): Validation
    {
        return Validation::make()->boolean();
    }

    public static function integer(): Validation
    {
        return Validation::make()->integer();
    }

    public static function numeric(): Validation
    {
        return Validation::make()->numeric();
    }

    public static function array(): Validation
    {
        return Validation::make()->array();
    }

    public static function arrayWithKeys(): Validation
    {
        return Validation::make()->array([
            'title',
            'slug',
            'content',
        ]);
    }

    public static function date(): Validation
    {
        return Validation::make()->date();
    }

    public static function file(): Validation
    {
        return Validation::make()->file();
    }

    public static function image(): Validation
    {
        return Validation::make()->image();
    }
}
