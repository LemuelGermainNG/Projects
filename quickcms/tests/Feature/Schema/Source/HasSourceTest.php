<?php

declare(strict_types=1);

use Tests\Fixtures\Testing\DummySchema;
use Tests\Fixtures\Sources\UserSource;

it('sets a source', function (): void {
    $schema = DummySchema::make()
        ->source(
            UserSource::class,
        );

    expect($schema->source())
        ->toBe(UserSource::class);

    expect($schema->hasSource())
        ->toBeTrue();
});

it('is immutable', function (): void {
    $schema = DummySchema::make();

    $updated = $schema->source(
        UserSource::class,
    );

    expect($updated)
        ->not->toBe($schema);

    expect($schema->source())
        ->toBeNull();

    expect($updated->source())
        ->toBe(UserSource::class);
});

it('detects when no source is defined', function (): void {
    expect(
        DummySchema::make()->hasSource(),
    )->toBeFalse();
});
