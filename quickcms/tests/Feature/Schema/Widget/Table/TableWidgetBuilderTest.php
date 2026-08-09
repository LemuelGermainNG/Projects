<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Table\TableWidgetAssertions;
use Tests\Support\Builders\Widget\Table\TableWidgetBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a table', function (): void {
    expect(
        TableWidgetBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TableWidgetAssertions::make(),
    );
});

it('compiles a table with data', function (): void {
    expect(
        TableWidgetBuilderFactory::withData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TableWidgetAssertions::withData(),
    );
});

it('compiles an empty table', function (): void {
    expect(
        TableWidgetBuilderFactory::empty()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TableWidgetAssertions::empty(),
    );
});

it('compiles a table source', function (): void {
    expect(
        TableWidgetBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        TableWidgetAssertions::source(),
    );
});
