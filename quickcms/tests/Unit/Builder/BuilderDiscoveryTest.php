<?php

declare(strict_types=1);

use App\Core\Builder\BuilderRegistry;
use Tests\Support\Builders\FakeBuilder;
use Tests\Support\Schemas\FakeSchema;

it('registers a builder', function (): void {
    $registry = new BuilderRegistry();

    $registry->register(
        FakeSchema::class,
        FakeBuilder::class,
    );

    expect($registry->builders())
        ->toHaveKey(FakeSchema::class)
        ->and($registry->builders()[FakeSchema::class])
        ->toBe(FakeBuilder::class);
});

it('returns all registered builders', function (): void {
    $registry = new BuilderRegistry();

    $registry->register(
        FakeSchema::class,
        FakeBuilder::class,
    );

    expect($registry->builders())
        ->toBe([
            FakeSchema::class => FakeBuilder::class,
        ]);
});

it('builds a schema', function (): void {
    $registry = new BuilderRegistry();

    $registry->register(
        FakeSchema::class,
        FakeBuilder::class,
    );

    expect(
        $registry->build(
            FakeSchema::make(),
        ),
    )->toBe([
        'builder' => FakeBuilder::class,
        'schema' => FakeSchema::class,
    ]);
});

it('throws an exception when no builder is registered', function (): void {
    $registry = new BuilderRegistry();

    expect(
        fn () => $registry->build(
            FakeSchema::make(),
        ),
    )->toThrow(
        InvalidArgumentException::class,
        sprintf(
            'No builder registered for schema [%s].',
            FakeSchema::class,
        ),
    );
});
