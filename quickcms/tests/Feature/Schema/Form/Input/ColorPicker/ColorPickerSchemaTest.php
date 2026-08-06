<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\ColorPicker\ColorPickerSchema;
use App\Core\Support\Enum\Color\ColorFormat;
use Tests\Support\Builders\ColorPickerBuilderFactory;

it('creates a color picker', function (): void {
    expect(
        ColorPickerBuilderFactory::make(),
    )->toBeInstanceOf(
        ColorPickerSchema::class,
    );
});

it('sets color picker properties', function (): void {
    $input = ColorPickerBuilderFactory::make();

    expect($input->value())->toBe('#2563eb');

    expect($input->isAlpha())->toBeTrue();

    expect($input->format())->toBe(
        ColorFormat::Hex,
    );

    expect($input->palette())->toBe([
        '#2563eb',
        '#22c55e',
        '#ef4444',
    ]);

    expect($input->isSwatches())->toBeTrue();
});
