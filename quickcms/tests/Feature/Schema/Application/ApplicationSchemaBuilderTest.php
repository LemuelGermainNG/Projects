<?php

declare(strict_types=1);

use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Brand\BrandSchema;
use App\Core\Schema\Navigation\NavigationGroupSchema;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

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

it('compiles application navigation', function (): void {
    $schema = ApplicationSchema::make()
        ->navigation(
            NavigationSchema::make()
                ->items([
                    NavigationItemSchema::make()
                        ->label('Dashboard')
                        ->route('dashboard'),

                    NavigationItemSchema::make()
                        ->label('Users')
                        ->route('users'),
                ]),
        );

    $compiled = $schema->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['navigation'])
        ->toMatchArray([
            'type' => 'navigation',
            'label' => null,
            'icon' => null,
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
            'groups' => [],
            'props' => [],
        ]);
});

it('compiles application navigation groups', function (): void {
    $schema = ApplicationSchema::make()
        ->navigation(
            NavigationSchema::make()
                ->groups([
                    NavigationGroupSchema::make()
                        ->label('Features')
                        ->items([
                            NavigationItemSchema::make()
                                ->label('Apps')
                                ->route('apps'),
                        ]),
                ]),
        );

    $compiled = $schema->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['navigation'])
        ->toMatchArray([
            'type' => 'navigation',
            'label' => null,
            'icon' => null,
            'items' => [],
            'groups' => [
                [
                    'type' => 'navigation-group',
                    'label' => 'Features',
                    'icon' => null,
                    'items' => [
                        [
                            'label' => 'Apps',
                            'icon' => null,
                            'route' => 'apps',
                            'url' => null,
                            'badge' => null,
                            'visible' => true,
                            'children' => [],
                            'props' => [],
                        ],
                    ],
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
        ->navigation(
            NavigationSchema::make()
                ->items([
                    NavigationItemSchema::make()
                        ->label('Dashboard')
                        ->route('dashboard'),
                ]),
        )
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

            'navigation' => [
                'type' => 'navigation',
                'label' => null,
                'icon' => null,
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
                ],
                'groups' => [],
                'props' => [],
            ],

            'props' => [
                'version' => '1.0.0',
            ],
        ]);
});
