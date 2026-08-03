<?php

declare(strict_types=1);

use App\Core\Source\Source;
use Spatie\QueryBuilder\QueryBuilder;
use Tests\Fixtures\Sources\User;
use Tests\Fixtures\Sources\UserData;
use Tests\Fixtures\Sources\UserSource;

it('creates a source', function (): void {
    expect(
        new UserSource(),
    )->toBeInstanceOf(Source::class);
});

it('returns the model class', function (): void {
    expect(
        UserSource::model(),
    )->toBe(User::class);
});

it('returns the data class', function (): void {
    expect(
        UserSource::data(),
    )->toBe(UserData::class);
});
