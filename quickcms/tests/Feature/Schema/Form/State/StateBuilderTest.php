<?php

declare(strict_types=1);

use Tests\Support\Assertions\State\StateAssertions;
use Tests\Support\Builders\State\StateBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a complete state', function (): void {
    expect(
        StateBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StateAssertions::make(),
    );
});

it('compiles a default state', function (): void {
    expect(
        StateBuilderFactory::default()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StateAssertions::default(),
    );
});

it('compiles a state path', function (): void {
    expect(
        StateBuilderFactory::path()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StateAssertions::path(),
    );
});

it('compiles hydration and dehydration', function (): void {
    expect(
        StateBuilderFactory::callbacks()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StateAssertions::callbacks(),
    );
});
