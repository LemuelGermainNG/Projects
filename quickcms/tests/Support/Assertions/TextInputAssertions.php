<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class TextInputAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'text-input',

            'name' => 'title',

            'value' => null,

            'placeholder' => 'Title',

            'disabled' => false,

            'readonly' => false,

            'validation' => ValidationAssertions::make(),

            'props' => [],
        ];
    }
}
