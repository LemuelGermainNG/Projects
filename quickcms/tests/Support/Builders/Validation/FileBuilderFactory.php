<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;

final class FileBuilderFactory
{
    public static function make(): Validation
    {
        return Validation::make()
            ->file()
            ->mimes([
                'jpg',
                'png',
                'webp',
            ])
            ->extensions([
                'jpg',
                'png',
                'webp',
            ])
            ->dimensions([
                'minWidth' => 800,
                'minHeight' => 600,
                'maxWidth' => 1920,
                'maxHeight' => 1080,
                'ratio' => 16 / 9,
            ]);
    }

    public static function image(): Validation
    {
        return Validation::make()
            ->image()
            ->mimes([
                'jpg',
                'png',
                'webp',
            ])
            ->extensions([
                'jpg',
                'png',
                'webp',
            ]);
    }

    public static function mimes(): Validation
    {
        return Validation::make()
            ->mimes([
                'jpg',
                'png',
                'webp',
            ]);
    }

    public static function extensions(): Validation
    {
        return Validation::make()
            ->extensions([
                'jpg',
                'png',
                'webp',
            ]);
    }

    public static function dimensions(): Validation
    {
        return Validation::make()
            ->dimensions([
                'minWidth' => 800,
                'minHeight' => 600,
                'maxWidth' => 1920,
                'maxHeight' => 1080,
                'ratio' => 16 / 9,
            ]);
    }
}
