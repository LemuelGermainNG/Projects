<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Text\TextInputSchema;
use App\Core\Schema\Form\State\StateSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('supports state on text input', function (): void {
    $input = TextInputSchema::make()
        ->state(
            StateSchema::make()
                ->path('name')
                ->default('John Doe'),
        );

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'state' => [
            'path' => 'name',
            'default' => 'John Doe',
        ],
    ]);
});

it('supports default state on text input', function (): void {
    $input = TextInputSchema::make()
        ->defaultState('John Doe');

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'state' => [
            'default' => 'John Doe',
        ],
    ]);
});

it('supports hydration on text input', function (): void {
    $input = TextInputSchema::make()
        ->hydrateState(
            fn (mixed $value): string => trim((string) $value),
        );

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'state' => [
            'hydrate' => true,
        ],
    ]);
});

it('supports dehydration on text input', function (): void {
    $input = TextInputSchema::make()
        ->dehydrateState(
            fn (mixed $value): string => mb_strtolower((string) $value),
        );

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'state' => [
            'dehydrate' => true,
        ],
    ]);
});

it('supports complete state configuration on text input', function (): void {
    $input = TextInputSchema::make()
        ->state(
            StateSchema::make()
                ->path('name')
                ->default('John Doe')
                ->hydrate(
                    fn (mixed $value): string => trim((string) $value),
                )
                ->dehydrate(
                    fn (mixed $value): string => mb_strtolower((string) $value),
                ),
        );

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'state' => [
            'path' => 'name',
            'default' => 'John Doe',
            'hydrate' => true,
            'dehydrate' => true,
        ],
    ]);
});
