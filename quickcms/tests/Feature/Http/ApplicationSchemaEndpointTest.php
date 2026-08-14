<?php

declare(strict_types=1);

use App\Core\Application\ApplicationManager;
use App\Core\Application\ApplicationRegistry;

beforeEach(function (): void {
    config([
        'quickcms.applications_path' => base_path(
            'tests/Fixtures/Applications',
        ),

        'quickcms.features_path' => base_path(
            'tests/Fixtures/Features',
        ),
    ]);

    /*
     * The QuickCmsServiceProvider has already been bootstrapped
     * by Laravel before the test configuration is applied.
     *
     * Therefore we explicitly discover the test applications.
     */
    app(ApplicationManager::class)->discover(
        config('quickcms.applications_path'),
    );
});

it('returns application metadata', function (): void {
    $response = $this->getJson(
        '/api/applications/admin',
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.id',
            'admin',
        )
        ->assertJsonPath(
            'data.name',
            'Administration',
        )
        ->assertJsonPath(
            'data.path',
            '/admin',
        )
        ->assertJsonPath(
            'data.layout',
            'sidebar',
        );
});

it('returns another application metadata', function (): void {
    $response = $this->getJson(
        '/api/applications/shop',
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.id',
            'shop',
        )
        ->assertJsonPath(
            'data.name',
            'Shop',
        )
        ->assertJsonPath(
            'data.path',
            '/shop',
        )
        ->assertJsonPath(
            'data.layout',
            'sidebar',
        );
});

it('returns not found for an unknown application', function (): void {
    $response = $this->getJson(
        '/api/applications/unknown',
    );

    $response
        ->assertNotFound()
        ->assertJson([
            'message' => 'Application not found.',
        ]);
});

it('returns an empty compiled schema for an application without contributions', function (): void {
    $registry = app(ApplicationRegistry::class);

    expect($registry->has('shop'))
        ->toBeTrue();

    $response = $this->getJson(
        '/api/applications/shop/schema',
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.application.id',
            'shop',
        )
        ->assertJsonPath(
            'data.application.name',
            'Shop',
        )
        ->assertJsonPath(
            'data.schema.type',
            'application',
        )
        ->assertJsonPath(
            'data.schema.brand',
            null,
        )
        ->assertJsonPath(
            'data.schema.root',
            null,
        )
        ->assertJsonPath(
            'data.schema.navigation.type',
            'navigation',
        )
        ->assertJsonPath(
            'data.schema.navigation.items',
            [],
        )
        ->assertJsonPath(
            'data.schema.navigation.groups',
            [],
        )
        ->assertJsonPath(
            'data.schema.navigation.props',
            [],
        )
        ->assertJsonPath(
            'data.schema.props',
            [],
        );
});

it('returns not found when compiling an unknown application', function (): void {
    $response = $this->getJson(
        '/api/applications/unknown/schema',
    );

    $response
        ->assertNotFound()
        ->assertJson([
            'message' => 'Application not found.',
        ]);
});
