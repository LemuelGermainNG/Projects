<?php

declare(strict_types=1);

use App\Core\Source\SourceRegistry;
use App\Features\User\Sources\FirebaseUserSource;

beforeEach(function (): void {
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
    )->toBe(101);
});
