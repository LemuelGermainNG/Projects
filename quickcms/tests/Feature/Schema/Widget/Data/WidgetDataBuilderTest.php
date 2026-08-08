<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Data\WidgetDataAssertions;
use Tests\Support\Builders\Widget\Data\WidgetDataBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles records', function (): void {
    expect(
        WidgetDataBuilderFactory::records()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetDataAssertions::records(),
    );
});

it('compiles pagination', function (): void {
    expect(
        WidgetDataBuilderFactory::pagination()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetDataAssertions::pagination(),
    );
});

it('compiles loading state', function (): void {
    expect(
        WidgetDataBuilderFactory::loading()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetDataAssertions::loading(),
    );
});

it('compiles empty state', function (): void {
    expect(
        WidgetDataBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetDataAssertions::empty(),
    );
});

it('compiles complete widget data', function (): void {
    expect(
        WidgetDataBuilderFactory::complete()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetDataAssertions::complete(),
    );
});

it('compiles empty widget data', function (): void {
    expect(
        WidgetDataBuilderFactory::emptyData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toBe(
        WidgetDataAssertions::emptyData(),
    );
});
