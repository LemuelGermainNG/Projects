<?php

declare(strict_types=1);

use Tests\Support\Assertions\KeyValueAssertions;
use Tests\Support\Builders\KeyValueBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a key value input', function (): void {
    expect(
        KeyValueBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        KeyValueAssertions::make(),
    );
});
