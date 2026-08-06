<?php

declare(strict_types=1);

use Tests\Support\Assertions\ColorPickerAssertions;
use Tests\Support\Builders\ColorPickerBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a color picker', function (): void {
    expect(
        ColorPickerBuilderFactory::make()->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray(
        ColorPickerAssertions::make(),
    );
});
