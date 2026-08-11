<?php

declare(strict_types=1);

use App\Features\User\Models\User;

it('returns user source data for widgets', function (): void {
    User::factory()
        ->count(3)
        ->create();

    $response = $this->getJson(
        '/api/sources/user',
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
    )->toHaveCount(3);
});

it('supports pagination for source data', function (): void {
    User::factory()
        ->count(25)
        ->create();

    $response = $this->getJson(
        '/api/sources/user?perPage=10&page=2',
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.pagination.enabled',
            true,
        )
        ->assertJsonPath(
            'data.pagination.perPage',
            10,
        )
        ->assertJsonPath(
            'data.pagination.page',
            2,
        )
        ->assertJsonPath(
            'data.pagination.total',
            25,
        )
        ->assertJsonPath(
            'data.pagination.lastPage',
            3,
        );

    expect(
        $response->json('data.records'),
    )->toHaveCount(10);
});
