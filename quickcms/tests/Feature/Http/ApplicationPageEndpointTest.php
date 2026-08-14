<?php

declare(strict_types=1);

use App\Applications\Admin\Navigation\AdminNavigation;
use App\Core\Application\Application;

beforeEach(function (): void {
    Application::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin')
        ->navigation(
            AdminNavigation::class,
        );
});

it('returns a page resolved from navigation', function (): void {
    $response = $this->getJson(
        '/api/applications/admin/pages/dashboard',
    );

    $response
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'application',
                'page',
            ],
        ]);
});

it('returns the expected dashboard page', function (): void {
    $response = $this->getJson(
        '/api/applications/admin/pages/dashboard',
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.page.metadata.title',
            'Dashboard',
        )
        ->assertJsonPath(
            'data.page.metadata.description',
            'Administration dashboard',
        )
        ->assertJsonPath(
            'data.page.header.title',
            'Dashboard',
        );
});

it('returns not found for an unknown page', function (): void {
    $this->getJson(
        '/api/applications/admin/pages/unknown',
    )->assertNotFound();
});

it('returns not found for an unknown application', function (): void {
    $this->getJson(
        '/api/applications/unknown/pages/dashboard',
    )->assertNotFound();
});

it('resolves nested page paths and returns dynamic parameters', function (): void {
    Application::make()
        ->id('dynamic-pages')
        ->name('Dynamic Pages')
        ->path('/dynamic-pages')
        ->navigation(
            \Tests\Support\Navigation\DynamicNavigation::class,
        );

    $response = $this->getJson(
        '/api/applications/dynamic-pages/pages/users/42/edit',
    );

    $response
        ->assertOk()
        ->assertJsonPath(
            'data.route',
            'users/42/edit',
        )
        ->assertJsonPath(
            'data.parameters.id',
            '42',
        )
        ->assertJsonPath(
            'data.page.metadata.title',
            'Edit User',
        );
});
