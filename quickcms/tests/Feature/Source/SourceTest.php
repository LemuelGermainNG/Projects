<?php

declare(strict_types=1);

use App\Core\Source\Source;
use App\Features\User\Sources\UserSource;

it('creates a source', function (): void {
    expect(
        new UserSource(),
    )->toBeInstanceOf(Source::class);
});

it('returns the source name', function (): void {
    expect(
        UserSource::name(),
    )->toBe('user');
});
