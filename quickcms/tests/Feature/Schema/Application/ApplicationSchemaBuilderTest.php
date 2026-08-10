<?php

declare(strict_types=1);

use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Brand\BrandSchema;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Schema\Page\PageSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an empty application schema', function (): void {
    $schema = ApplicationSchema::make();

    $compiled = $schema->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled)
        ->toBe([
            'type' => 'application',

            'brand' => null,

            'pages' => [],

            'navigation' => [],

            'props' => [],
        ]);
});

it('compiles application brand', function (): void {
    $schema = ApplicationSchema::make()
        ->brand(
            BrandSchema::make()
                ->name('QuickCMS')
                ->logo('/logo.svg')
                ->favicon('/favicon.ico'),
        );

    $compiled = $schema->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['brand'])
        ->toBe([
            'type' => 'brand',
            'name' => 'QuickCMS',
            'logo' => '/logo.svg',
            'favicon' => '/favicon.ico',
        ]);
});

it('compiles application pages', function (): void {
    $schema = ApplicationSchema::make()
        ->pages([
            PageSchema::make()
                ->header(
                    HeaderSchema::make()
                        ->title('Dashboard'),
                ),

            PageSchema::make()
                ->header(
                    HeaderSchema::make()
                        ->title('Users'),
                ),
        ]);

    $compiled = $schema->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['pages'])
        ->toHaveCount(2);

    expect($compiled['pages'][0])
        ->toMatchArray([
            'type' => 'page',

            'header' => [
                'type' => 'header',
                'title' => 'Dashboard',
                'description' => null,
                'icon' => null,
                'props' => [],
            ],

            'content' => null,

            'props' => [],
        ]);

    expect($compiled['pages'][1])
        ->toMatchArray([
            'type' => 'page',

            'header' => [
                'type' => 'header',
                'title' => 'Users',
                'description' => null,
                'icon' => null,
                'props' => [],
            ],

            'content' => null,

            'props' => [],
        ]);
});

it('compiles application navigation', function (): void {
    $schema = ApplicationSchema::make()
        ->navigation([
            NavigationSchema::make()
                ->label('Administration')
                ->items([
                    NavigationItemSchema::make()
                        ->label('Dashboard')
                        ->route('dashboard'),

                    NavigationItemSchema::make()
                        ->label('Users')
                        ->route('users'),
                ]),
        ]);

    $compiled = $schema->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['navigation'])
        ->toHaveCount(1);

    expect($compiled['navigation'][0])
        ->toMatchArray([
            'type' => 'navigation',
            'label' => 'Administration',
            'items' => [
                [
                    'label' => 'Dashboard',
                    'icon' => null,
                    'route' => 'dashboard',
                    'url' => null,
                    'badge' => null,
                    'visible' => true,
                    'children' => [],
                    'props' => [],
                ],
                [
                    'label' => 'Users',
                    'icon' => null,
                    'route' => 'users',
                    'url' => null,
                    'badge' => null,
                    'visible' => true,
                    'children' => [],
                    'props' => [],
                ],
            ],
            'props' => [],
        ]);
});

it('compiles a complete application schema', function (): void {
    $schema = ApplicationSchema::make()
        ->brand(
            BrandSchema::make()
                ->name('QuickCMS')
                ->logo('/logo.svg'),
        )
        ->pages([
            PageSchema::make()
                ->header(
                    HeaderSchema::make()
                        ->title('Dashboard'),
                ),
        ])
        ->navigation([
            NavigationSchema::make()
                ->label('Administration')
                ->items([
                    NavigationItemSchema::make()
                        ->label('Dashboard')
                        ->route('dashboard'),
                ]),
        ])
        ->props([
            'version' => '1.0.0',
        ]);

    $compiled = $schema->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled)
        ->toMatchArray([
            'type' => 'application',

            'brand' => [
                'type' => 'brand',
                'name' => 'QuickCMS',
                'logo' => '/logo.svg',
                'favicon' => null,
            ],

            'props' => [
                'version' => '1.0.0',
            ],
        ]);

    expect($compiled['pages'])
        ->toHaveCount(1);

    expect($compiled['navigation'])
        ->toHaveCount(1);
});
