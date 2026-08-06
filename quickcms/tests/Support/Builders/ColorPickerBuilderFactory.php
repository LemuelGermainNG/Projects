<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Input\ColorPicker\ColorPickerSchema;
use App\Core\Support\Enum\Color\ColorFormat;

final class ColorPickerBuilderFactory
{
    public static function make(): ColorPickerSchema
    {
        return ColorPickerSchema::make()
            ->value('#2563eb')
            ->format(ColorFormat::Hex)
            ->alpha()
            ->palette([
                '#2563eb',
                '#22c55e',
                '#ef4444',
            ])
            ->swatches();
    }
}
