<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Card\CardWidgetAssertions;
use Tests\Support\Builders\Widget\Card\CardWidgetBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a card', function (): void {
    expect(
        CardWidgetBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CardWidgetAssertions::make(),
    );
});

it('compiles a card with data', function (): void {
    expect(
        CardWidgetBuilderFactory::withData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CardWidgetAssertions::withData(),
    );
});

it('compiles an empty card', function (): void {
    expect(
        CardWidgetBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CardWidgetAssertions::empty(),
    );
});

it('compiles a card source', function (): void {
    expect(
        CardWidgetBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        CardWidgetAssertions::source(),
    );
});
