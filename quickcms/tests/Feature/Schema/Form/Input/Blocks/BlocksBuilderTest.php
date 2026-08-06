<?php

declare(strict_types=1);

use Tests\Support\Assertions\BlocksAssertions;
use Tests\Support\Builders\BlocksBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles blocks input', function (): void {
    expect(
        BlocksBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        BlocksAssertions::make(),
    );
});
