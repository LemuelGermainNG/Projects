<?php

declare(strict_types=1);

use Tests\Support\Assertions\Widget\Stats\StatsAssertions;
use Tests\Support\Builders\Widget\Stats\StatsBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a stats widget', function (): void {
    expect(
        StatsBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StatsAssertions::make(),
    );
});

it('compiles a stats widget with data', function (): void {
    expect(
        StatsBuilderFactory::withData()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StatsAssertions::withData(),
    );
});

it('compiles an empty stats widget', function (): void {
    $compiled = StatsBuilderFactory::empty()
        ->compile(
            BuilderRegistryFactory::make(),
        );

    expect($compiled)
        ->toMatchArray(
            StatsAssertions::empty(),
        );
});

it('compiles a stats source', function (): void {
    expect(
        StatsBuilderFactory::source()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StatsAssertions::source(),
    );
});
