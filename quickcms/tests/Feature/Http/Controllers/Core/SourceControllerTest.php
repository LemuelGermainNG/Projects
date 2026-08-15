<?php

declare(strict_types=1);

use App\Core\Source\SourceRegistry;
use App\Features\User\Models\User;
use App\Features\User\Sources\UserSource;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    app(SourceRegistry::class)->register(
        UserSource::class,
    );
});

it('returns source records for widgets', function (): void {
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

it('passes pagination parameters to the source', function (): void {
    User::factory()
        ->count(25)
        ->create();

    $response = $this->getJson(
        '/api/sources/user?page=2&perPage=10',
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.pagination.page',
            2,
        )
        ->assertJsonPath(
            'data.pagination.perPage',
            10,
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

it('passes filters to the source', function (): void {
    User::factory()
        ->count(2)
        ->create([
            'status' => 'active',
        ]);

    User::factory()
        ->create([
            'status' => 'inactive',
        ]);

    $response = $this->getJson(
        '/api/sources/user?filter[status]=active',
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.pagination.total',
            2,
        );

    expect(
        $response->json('data.records'),
    )->toHaveCount(2);
});

it('passes sorting to the source', function (): void {
    User::factory()->create([
        'name' => 'Zachary',
    ]);

    User::factory()->create([
        'name' => 'Alice',
    ]);

    $response = $this->getJson(
        '/api/sources/user?sort=name',
    );

    $response
        ->assertOk();

    expect(
        $response->json('data.records.0.name'),
    )->toBe('Alice');

    expect(
        $response->json('data.records.1.name'),
    )->toBe('Zachary');
});


it('returns a single source record', function (): void {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'status' => 'active',
    ]);

    $response = $this->getJson(
        "/api/sources/user/{$user->id}",
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.record.id',
            $user->id,
        )
        ->assertJsonPath(
            'data.record.name',
            'John Doe',
        )
        ->assertJsonPath(
            'data.record.email',
            'john@example.com',
        )
        ->assertJsonPath(
            'data.record.status',
            'active',
        );
});

it('returns not found when a source record does not exist', function (): void {
    $response = $this->getJson(
        '/api/sources/user/999999',
    );

    $response
        ->assertNotFound()
        ->assertJson([
            'message' => 'Source record not found.',
        ]);
});
