<?php

declare(strict_types=1);

use App\Core\Schema\Form\State\State;

it('creates a state schema', function (): void {
    expect(
        State::make(),
    )->toBeInstanceOf(State::class);
});

it('sets a state path', function (): void {
    $state = State::make()
        ->path('user.name');

    expect($state->statePath())
        ->toBe('user.name');
});

it('sets a default value', function (): void {
    $state = State::make()
        ->default('John Doe');

    expect($state->defaultValue())
        ->toBe('John Doe');
});

it('accepts a dynamic default value', function (): void {
    $state = State::make()
        ->default(
            fn (): string => 'John Doe',
        );

    expect($state->defaultValue())
        ->toBeInstanceOf(Closure::class);
});

it('sets hydration callback', function (): void {
    $callback = fn (mixed $value): string => trim((string) $value);

    $state = State::make()
        ->hydrate($callback);

    expect($state->hydrateCallback())
        ->toBe($callback);
});

it('sets dehydration callback', function (): void {
    $callback = fn (mixed $value): string => mb_strtolower((string) $value);

    $state = State::make()
        ->dehydrate($callback);

    expect($state->dehydrateCallback())
        ->toBe($callback);
});

it('hydrates a value', function (): void {
    $state = State::make()
        ->hydrate(
            fn (mixed $value): string => trim((string) $value),
        );

    expect(
        $state->hydrateValue('  John Doe  '),
    )->toBe('John Doe');
});

it('dehydrates a value', function (): void {
    $state = State::make()
        ->dehydrate(
            fn (mixed $value): string => mb_strtolower((string) $value),
        );

    expect(
        $state->dehydrateValue('John Doe'),
    )->toBe('john doe');
});

it('returns the original value without hydration callback', function (): void {
    expect(
        State::make()
            ->hydrateValue('John Doe'),
    )->toBe('John Doe');
});

it('returns the original value without dehydration callback', function (): void {
    expect(
        State::make()
            ->dehydrateValue('John Doe'),
    )->toBe('John Doe');
});

it('is immutable', function (): void {
    $state = State::make();

    $updated = $state
        ->path('name')
        ->default('John Doe');

    expect($updated)
        ->not->toBe($state);

    expect($state->statePath())
        ->toBeNull();

    expect($state->defaultValue())
        ->toBeNull();

    expect($updated->statePath())
        ->toBe('name');

    expect($updated->defaultValue())
        ->toBe('John Doe');
});
