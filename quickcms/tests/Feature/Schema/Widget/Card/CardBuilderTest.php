<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Card\CardAssertions;
use Tests\Support\Builders\Widget\Card\CardBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a card', function (): void {
    expect(
        CardBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CardAssertions::make(),
    );
});

it('compiles a card with data', function (): void {
    expect(
        CardBuilderFactory::withData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CardAssertions::withData(),
    );
});

it('compiles an empty card', function (): void {
    expect(
        CardBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CardAssertions::empty(),
    );
});

it('compiles a card source', function (): void {
    expect(
        CardBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CardAssertions::source(),
    );
});
