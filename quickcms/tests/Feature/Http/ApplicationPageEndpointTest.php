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
