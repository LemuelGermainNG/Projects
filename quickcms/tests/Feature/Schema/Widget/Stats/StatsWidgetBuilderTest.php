<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Stats\StatsWidgetAssertions;
use Tests\Support\Builders\Widget\Stats\StatsWidgetBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a stats widget', function (): void {
    expect(
        StatsWidgetBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StatsWidgetAssertions::make(),
    );
});

it('compiles a stats widget with data', function (): void {
    expect(
        StatsWidgetBuilderFactory::withData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StatsWidgetAssertions::withData(),
    );
});

it('compiles an empty stats widget', function (): void {
    $compiled = StatsWidgetBuilderFactory::empty()
        ->compile(
            BuilderRegistryFactory::make(),
        );

    expect($compiled)
        ->toMatchArray(
            StatsWidgetAssertions::empty(),
        );
});

it('compiles a stats source', function (): void {
    expect(
        StatsWidgetBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StatsWidgetAssertions::source(),
    );
});
