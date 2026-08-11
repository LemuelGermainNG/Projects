<?php

declare(strict_types=1);

use App\Core\Source\SourceRegistry;
use App\Features\User\Sources\UserSource;

it('resolves a source', function (): void {
    $registry = new SourceRegistry();

    expect(
        $registry->resolve(UserSource::class),
    )->toBeInstanceOf(UserSource::class);
});

it('always returns the same source type', function (): void {
    $registry = new SourceRegistry();

    $source = $registry->resolve(
        UserSource::class,
    );

    expect($source)
        ->toBeInstanceOf(UserSource::class);

    expect($source::name())
        ->toBe('user');
});
