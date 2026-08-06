<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class ColorPickerAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'color-picker',

            'value' => '#2563eb',

            'format' => 'hex',

            'alpha' => true,

            'palette' => [
                '#2563eb',
                '#22c55e',
                '#ef4444',
            ],

            'swatches' => true,
        ];
    }
}
