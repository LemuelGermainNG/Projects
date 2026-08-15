<?php

declare(strict_types=1);

use App\Core\Source\Drivers\Model\ModelQuery;
use App\Core\Source\SourceRequest;
use App\Features\User\Models\User;

it('creates a model query', function (): void {
    User::factory()
        ->count(3)
        ->create();

    $query = ModelQuery::for(
        model: User::class,
        request: new SourceRequest(),
        allowedFilters:[],
        allowedSorts:[],

    );

    expect($query->get())
        ->toHaveCount(3);
});

it('supports allowed filters', function (): void {
    User::factory()->create([
        'status' => 'active',
    ]);

    User::factory()->create([
        'status' => 'inactive',
    ]);

    $query = ModelQuery::for(
        model: User::class,
        request: new SourceRequest(),
        allowedFilters: [
            'status',
        ],
        allowedSorts: [],
    );

    expect($query)
        ->toBeInstanceOf(
            \Spatie\QueryBuilder\QueryBuilder::class,
        );
});


it('reads a single model record', function (): void {
    $user = User::factory()->create([
        'name' => 'John Doe',
    ]);

    $result = \App\Core\Source\Drivers\ModelSource::read(
        model: User::class,
        data: \App\Features\User\Data\UserData::class,
        id: $user->id,
        request: new SourceRequest(),
    );

    expect($result->records)
        ->toHaveCount(1)
        ->and($result->records[0]['id'])
        ->toBe($user->id);
});

it('returns an empty result for an unknown model record', function (): void {
    $result = \App\Core\Source\Drivers\ModelSource::read(
        model: User::class,
        data: \App\Features\User\Data\UserData::class,
        id: 999999,
        request: new SourceRequest(),
    );

    expect($result->records)
        ->toBe([]);
});
