<?php

declare(strict_types=1);

use App\Core\Source\SourceRegistry;
use App\Features\User\Sources\UserSource;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    app(SourceRegistry::class)->register(
        UserSource::class,
    );
});

it('returns source records for widgets', function (): void {
    \App\Features\User\Models\User::factory()
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
});
