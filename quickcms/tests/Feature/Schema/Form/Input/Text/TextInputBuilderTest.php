<?php

declare(strict_types=1);

use Tests\Support\Assertions\TextInputAssertions;
use Tests\Support\Builders\TextInputBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a text input', function (): void {
    expect(
        TextInputBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TextInputAssertions::make(),
    );
});
