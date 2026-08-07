<?php

declare(strict_types=1);

use Tests\Support\Assertions\ValidationAssertions;
use Tests\Support\Builders\ValidationBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles validation rules', function (): void {
    expect(
        ValidationBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ValidationAssertions::make(),
    );
});
