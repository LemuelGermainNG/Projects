<?php

declare(strict_types=1);

use App\Features\User\Sources\FirebaseUserSource;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;

it('resolves users from firestore', function (): void {
    $result = app(FirebaseUserSource::class)->resolve(
        new SourceRequest(),
    );

    expect($result)
        ->toBeInstanceOf(SourceResult::class);

    expect($result->records)
        ->toHaveCount(100);

    expect($result->records[0])
        ->toHaveKeys([
            'id',
            'name',
            'email',
            'status',
        ]);
});

it('filters users by status', function (): void {
    $result = app(FirebaseUserSource::class)->resolve(
        new SourceRequest(
            query: [
                'filter' => [
                    'status' => 'active',
                ],
            ],
        ),
    );

    expect($result->records)
        ->not->toBeEmpty();

    foreach ($result->records as $record) {
        expect($record['status'])
            ->toBe('active');
    }
});

it('sorts firebase users by name', function (): void {
    $result = app(FirebaseUserSource::class)->resolve(
        new SourceRequest(
            query: [
                'sort' => 'name',
            ],
        ),
    );

    $names = array_column(
        $result->records,
        'name',
    );

    $expected = $names;

    sort($expected);

    expect($names)
        ->toBe($expected);
});

it('sorts firebase users by name descending', function (): void {
    $result = app(FirebaseUserSource::class)->resolve(
        new SourceRequest(
            query: [
                'sort' => '-name',
            ],
        ),
    );

    $names = array_column(
        $result->records,
        'name',
    );

    $expected = $names;

    rsort($expected);

    expect($names)
        ->toBe($expected);
});
