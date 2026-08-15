<?php

declare(strict_types=1);

use App\Core\Source\SourceRegistry;
use App\Core\Source\SourceRequest;
use App\Features\User\Sources\FirebaseUserSource;

beforeEach(function (): void {
    if (! (bool) env('RUN_FIREBASE_INTEGRATION_TESTS', false)) {
        $this->markTestSkipped(
            'Set RUN_FIREBASE_INTEGRATION_TESTS=true to run Firebase integration tests.',
        );
    }

    app(SourceRegistry::class)->register(
        FirebaseUserSource::class,
    );
});

it('returns firebase users through the source api', function (): void {
    $response = $this->getJson(
        '/api/sources/firebase-user',
    );

    $response
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'records' => [
                    '*' => [
                        'id',
                        'name',
                        'email',
                        'status',
                    ],
                ],
                'pagination' => [
                    'enabled',
                    'perPage',
                    'page',
                    'total',
                    'lastPage',
                ],
            ],
        ]);

    expect(
        $response->json('data.records'),
    )->toHaveCount(101);

    expect(
        $response->json('data.pagination.enabled'),
    )->toBeFalse();

    expect(
        $response->json('data.pagination.total'),
    )->toBe(100);
});

it('paginates firebase users', function (): void {
    $result = app(FirebaseUserSource::class)->resolve(
        new SourceRequest(
            page: 1,
            perPage: 20,
        ),
    );

    expect($result->records)
        ->toHaveCount(20);

    expect($result->pagination)
        ->toMatchArray([
            'enabled' => true,
            'perPage' => 20,
            'page' => 1,
            'total' => 100,
            'lastPage' => 5,
        ]);

    expect($result->pagination['nextCursor'])
        ->toBeString()
        ->not->toBeEmpty();
});

it('returns the next firebase page using the cursor', function (): void {
    $firstPage = app(FirebaseUserSource::class)->resolve(
        new SourceRequest(
            page: 1,
            perPage: 20,
        ),
    );

    $cursor = $firstPage->pagination['nextCursor'];

    $secondPage = app(FirebaseUserSource::class)->resolve(
        new SourceRequest(
            page: 2,
            perPage: 20,
            query: [
                'cursor' => $cursor,
            ],
        ),
    );

    expect($secondPage->records)
        ->toHaveCount(20);

    expect($secondPage->pagination['page'])
        ->toBe(2);

    expect(
        $secondPage->records[0]['id'],
    )->not->toBe(
        $firstPage->records[0]['id'],
    );
});


it('returns a single firebase user through the source api', function (): void {
    $response = $this->getJson(
        '/api/sources/firebase-user/quickcms-test-user-1',
    );

    $response
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'record' => [
                    'id',
                    'name',
                    'email',
                    'status',
                ],
            ],
        ]);
});
