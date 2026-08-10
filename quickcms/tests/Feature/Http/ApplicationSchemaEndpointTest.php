<?php

declare(strict_types=1);

use App\Core\Application\ApplicationManager;
use App\Core\Application\ApplicationRegistry;
use Tests\Fixtures\Navigation\NavigationProvider;
use Tests\Fixtures\Pages\DashboardPage;
use Tests\Fixtures\Pages\UsersPage;

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
            'default',
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
            'default',
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

it('returns the compiled application schema', function (): void {
    $response = $this->getJson(
        '/api/applications/admin/schema',
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.application.id',
            'admin',
        )
        ->assertJsonPath(
            'data.application.name',
            'Administration',
        )
        ->assertJsonPath(
            'data.application.path',
            '/admin',
        )
        ->assertJsonPath(
            'data.application.layout',
            'default',
        );

    /*
     * ApplicationSchemaBuilder
     */
    $response
        ->assertJsonPath(
            'data.schema.type',
            'application',
        )
        ->assertJsonPath(
            'data.schema.brand',
            null,
        )
        ->assertJsonPath(
            'data.schema.props',
            [],
        );

    /*
     * First page.
     */
    $response
        ->assertJsonPath(
            'data.schema.pages.0.type',
            'page',
        )
        ->assertJsonPath(
            'data.schema.pages.0.header.type',
            'header',
        )
        ->assertJsonPath(
            'data.schema.pages.0.header.title',
            'Dashboard',
        );

    /*
     * Second page.
     */
    $response
        ->assertJsonPath(
            'data.schema.pages.1.type',
            'page',
        )
        ->assertJsonPath(
            'data.schema.pages.1.header.type',
            'header',
        )
        ->assertJsonPath(
            'data.schema.pages.1.header.title',
            'Users',
        );

    /*
     * Navigation.
     */
    $response
        ->assertJsonPath(
            'data.schema.navigation.0.type',
            'navigation',
        )
        ->assertJsonPath(
            'data.schema.navigation.0.label',
            'Administration',
        );

    expect(
        $response->json('data.schema.pages'),
    )->toHaveCount(2);

    expect(
        $response->json('data.schema.navigation'),
    )->toHaveCount(1);
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
            'data.schema.pages',
            [],
        )
        ->assertJsonPath(
            'data.schema.navigation',
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


it('compiles feature contributed pages and navigation', function (): void {
    $response = $this->getJson(
        '/api/applications/shop/schema',
    );

    $response
        ->assertOk();

    $pages = $response->json(
        'data.schema.pages',
    );

    $navigation = $response->json(
        'data.schema.navigation',
    );

    expect($pages)
        ->not->toBeEmpty();

    expect($navigation)
        ->not->toBeEmpty();

    expect($pages[0])
        ->toHaveKey('type');

    expect($navigation[0])
        ->toHaveKey('type');
});
