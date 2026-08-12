<?php

declare(strict_types=1);

use App\Core\Source\Drivers\Firebase\FirebaseQuery;
use App\Core\Source\SourceRequest;
use Kreait\Firebase\Contract\Firestore;
use Google\Cloud\Firestore\Query;

it('applies an allowed firestore filter', function (): void {
    $firestore = app(Firestore::class);

    $query = $firestore
        ->database()
        ->collection('users');

    $result = FirebaseQuery::for(
        query: $query,
        request: new SourceRequest(
            query: [
                'filter' => [
                    'status' => 'active',
                ],
            ],
        ),
        allowedFilters: [
            'status',
        ],
    );

    expect($result)
        ->toBeInstanceOf(Query::class);

    $documents = $result->documents();

    foreach ($documents as $document) {
        expect($document->data()['status'])
            ->toBe('active');
    }
});

it('rejects a filter that is not allowed', function (): void {
    $firestore = app(Firestore::class);

    $query = $firestore
        ->database()
        ->collection('users');

    expect(
        fn () => FirebaseQuery::for(
            query: $query,
            request: new SourceRequest(
                query: [
                    'filter' => [
                        'password' => 'secret',
                    ],
                ],
            ),
            allowedFilters: [
                'status',
            ],
        ),
    )->toThrow(
        InvalidArgumentException::class,
        'Filter [password] is not allowed.',
    );
});


it('sorts users by name ascending', function (): void {
    $firestore = app(Firestore::class);

    $query = $firestore
        ->database()
        ->collection('users');

    $result = FirebaseQuery::for(
        query: $query,
        request: new SourceRequest(
            query: [
                'sort' => 'name',
            ],
        ),
        allowedSorts: [
            'name',
        ],
    );

    $documents = $result->documents();

    $names = [];

    foreach ($documents as $document) {
        if ($document->exists()) {
            $names[] = $document->data()['name'];
        }
    }

    $expected = $names;

    sort($expected);

    expect($names)->toBe($expected);
});


it('sorts users by name descending', function (): void {
    $firestore = app(Firestore::class);

    $query = $firestore
        ->database()
        ->collection('users');

    $result = FirebaseQuery::for(
        query: $query,
        request: new SourceRequest(
            query: [
                'sort' => '-name',
            ],
        ),
        allowedSorts: [
            'name',
        ],
    );

    $documents = $result->documents();

    $names = [];

    foreach ($documents as $document) {
        if ($document->exists()) {
            $names[] = $document->data()['name'];
        }
    }

    $expected = $names;

    rsort($expected);

    expect($names)->toBe($expected);
});


it('rejects a sort that is not allowed', function (): void {
    $firestore = app(Firestore::class);

    $query = $firestore
        ->database()
        ->collection('users');

    expect(
        fn () => FirebaseQuery::for(
            query: $query,
            request: new SourceRequest(
                query: [
                    'sort' => 'password',
                ],
            ),
            allowedSorts: [
                'name',
                'email',
                'status',
            ],
        ),
    )->toThrow(
        InvalidArgumentException::class,
        'Sort [password] is not allowed.',
    );
});
