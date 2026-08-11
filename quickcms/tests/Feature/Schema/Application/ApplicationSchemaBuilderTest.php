<?php

declare(strict_types=1);

use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Brand\BrandSchema;
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

    expect($compiled['navigation'])
        ->toHaveCount(1);
});
