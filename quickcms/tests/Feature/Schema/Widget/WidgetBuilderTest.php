<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\WidgetAssertions;
use Tests\Support\Builders\Widget\WidgetBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a complete widget', function (): void {
    expect(
        WidgetBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::make(),
    );
});

it('compiles a widget key', function (): void {
    expect(
        WidgetBuilderFactory::key()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::key(),
    );
});

it('compiles a widget title', function (): void {
    expect(
        WidgetBuilderFactory::title()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::title(),
    );
});

it('compiles a widget description', function (): void {
    expect(
        WidgetBuilderFactory::description()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::description(),
    );
});

it('compiles a widget icon', function (): void {
    expect(
        WidgetBuilderFactory::icon()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::icon(),
    );
});

it('compiles widget visibility', function (): void {
    expect(
        WidgetBuilderFactory::visibility()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::visibility(),
    );
});

it('compiles widget width', function (): void {
    expect(
        WidgetBuilderFactory::width()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::width(),
    );
});

it('compiles widget columns', function (): void {
    expect(
        WidgetBuilderFactory::columns()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::columns(),
    );
});

it('compiles widget props', function (): void {
    expect(
        WidgetBuilderFactory::props()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::props(),
    );
});

it('compiles an empty widget', function (): void {
    expect(
        WidgetBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        WidgetAssertions::empty(),
    );
});
