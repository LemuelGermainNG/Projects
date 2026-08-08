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

it('compiles a dynamic default state', function (): void {
    expect(
        StateBuilderFactory::dynamicDefault()
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

it('compiles state callbacks', function (): void {
    expect(
        StateBuilderFactory::callbacks()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StateAssertions::callbacks(),
    );
});

it('compiles live state', function (): void {
    expect(
        StateBuilderFactory::live()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StateAssertions::live(),
    );
});

it('compiles reactive state', function (): void {
    expect(
        StateBuilderFactory::reactive()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StateAssertions::reactive(),
    );
});

it('compiles persistent state', function (): void {
    expect(
        StateBuilderFactory::persist()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StateAssertions::persist(),
    );
});

it('does not expose dehydrated when enabled by default', function (): void {
    $compiled = StateBuilderFactory::dehydrated()
        ->compile(
            BuilderRegistryFactory::make(),
        );

    expect($compiled)
        ->not->toHaveKey('dehydrated');
});

it('compiles disabled dehydration', function (): void {
    expect(
        StateBuilderFactory::notDehydrated()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        StateAssertions::notDehydrated(),
    );
});
