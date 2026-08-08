<?php

declare(strict_types=1);

use App\Core\Schema\Form\State\StateSchema;

it('creates a state schema', function (): void {
    expect(
        StateSchema::make(),
    )->toBeInstanceOf(StateSchema::class);
});

it('sets a state path', function (): void {
    $state = StateSchema::make()
        ->path('user.name');

    expect($state->statePath())
        ->toBe('user.name');
});

it('sets a default value', function (): void {
    $state = StateSchema::make()
        ->default('John Doe');

    expect($state->defaultValue())
        ->toBe('John Doe');
});

it('accepts a dynamic default value', function (): void {
    $state = StateSchema::make()
        ->default(
            fn (): string => 'John Doe',
        );

    expect($state->defaultValue())
        ->toBeInstanceOf(Closure::class);
});

it('sets live state', function (): void {
    $state = StateSchema::make()
        ->live();

    expect($state->isLive())
        ->toBeTrue();
});

it('sets reactive state', function (): void {
    $state = StateSchema::make()
        ->reactive();

    expect($state->isReactive())
        ->toBeTrue();
});

it('sets persistent state', function (): void {
    $state = StateSchema::make()
        ->persist();

    expect($state->shouldPersist())
        ->toBeTrue();
});

it('enables dehydration by default', function (): void {
    expect(
        StateSchema::make()
            ->shouldDehydrate(),
    )->toBeTrue();
});

it('can disable dehydration', function (): void {
    expect(
        StateSchema::make()
            ->dehydrated(false)
            ->shouldDehydrate(),
    )->toBeFalse();
});

it('sets hydration callback', function (): void {
    $callback = fn (mixed $value): string => trim((string) $value);

    $state = StateSchema::make()
        ->hydrate($callback);

    expect($state->hydrateCallback())
        ->toBe($callback);
});

it('sets after hydrate callback', function (): void {
    $callback = fn (mixed $value): mixed => $value;

    $state = StateSchema::make()
        ->afterHydrate($callback);

    expect($state->afterHydrateCallback())
        ->toBe($callback);
});

it('sets after update callback', function (): void {
    $callback = fn (mixed $value): mixed => $value;

    $state = StateSchema::make()
        ->afterUpdate($callback);

    expect($state->afterUpdateCallback())
        ->toBe($callback);
});

it('sets before dehydrate callback', function (): void {
    $callback = fn (mixed $value): mixed => $value;

    $state = StateSchema::make()
        ->beforeDehydrate($callback);

    expect($state->beforeDehydrateCallback())
        ->toBe($callback);
});

it('sets dehydration callback', function (): void {
    $callback = fn (mixed $value): string => mb_strtolower((string) $value);

    $state = StateSchema::make()
        ->dehydrate($callback);

    expect($state->dehydrateCallback())
        ->toBe($callback);
});

it('hydrates a value', function (): void {
    $state = StateSchema::make()
        ->hydrate(
            fn (mixed $value): string => trim((string) $value),
        );

    expect(
        $state->hydrateValue('  John Doe  '),
    )->toBe('John Doe');
});

it('runs after hydrate after hydration', function (): void {
    $state = StateSchema::make()
        ->hydrate(
            fn (mixed $value): string => trim((string) $value),
        )
        ->afterHydrate(
            fn (mixed $value): string => mb_strtoupper((string) $value),
        );

    expect(
        $state->hydrateValue('  John Doe  '),
    )->toBe('JOHN DOE');
});

it('runs after update', function (): void {
    $state = StateSchema::make()
        ->afterUpdate(
            fn (mixed $value): string => mb_strtoupper((string) $value),
        );

    expect(
        $state->updateValue('john doe'),
    )->toBe('JOHN DOE');
});

it('runs before dehydrate before dehydration', function (): void {
    $state = StateSchema::make()
        ->beforeDehydrate(
            fn (mixed $value): string => trim((string) $value),
        )
        ->dehydrate(
            fn (mixed $value): string => mb_strtolower((string) $value),
        );

    expect(
        $state->dehydrateValue('  JOHN DOE  '),
    )->toBe('john doe');
});

it('dehydrates a value', function (): void {
    $state = StateSchema::make()
        ->dehydrate(
            fn (mixed $value): string => mb_strtolower((string) $value),
        );

    expect(
        $state->dehydrateValue('John Doe'),
    )->toBe('john doe');
});

it('returns the original value without hydration callback', function (): void {
    expect(
        StateSchema::make()
            ->hydrateValue('John Doe'),
    )->toBe('John Doe');
});

it('returns the original value without dehydration callback', function (): void {
    expect(
        StateSchema::make()
            ->dehydrateValue('John Doe'),
    )->toBe('John Doe');
});

it('is immutable', function (): void {
    $state = StateSchema::make();

    $updated = $state
        ->path('name')
        ->default('John Doe')
        ->live()
        ->reactive()
        ->persist();

    expect($updated)
        ->not->toBe($state);

    expect($state->statePath())
        ->toBeNull();

    expect($state->defaultValue())
        ->toBeNull();

    expect($state->isLive())
        ->toBeFalse();

    expect($state->isReactive())
        ->toBeFalse();

    expect($state->shouldPersist())
        ->toBeFalse();

    expect($updated->statePath())
        ->toBe('name');

    expect($updated->defaultValue())
        ->toBe('John Doe');

    expect($updated->isLive())
        ->toBeTrue();

    expect($updated->isReactive())
        ->toBeTrue();

    expect($updated->shouldPersist())
        ->toBeTrue();
});
