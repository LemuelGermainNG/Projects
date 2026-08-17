<?php

declare(strict_types=1);

use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Brand\BrandSchema;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Schema\Widget\Table\TableWidgetSchema;
use Tests\Support\Factories\BuilderRegistryFactory;
use Tests\Fixtures\Sources\UserSource;

it('keeps the application SDUI envelope stable', function (): void {
    $compiled = ApplicationSchema::make()
        ->brand(
            BrandSchema::make()
                ->name('QuickCMS')
                ->logo('/logo.svg'),
        )
        ->root('dashboard')
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
        ])
        ->compile(
            BuilderRegistryFactory::make(),
        );

    expect($compiled)->toBe([
        'type' => 'application',
        'brand' => [
            'type' => 'brand',
            'name' => 'QuickCMS',
            'logo' => '/logo.svg',
            'favicon' => null,
        ],
        'root' => 'dashboard',
        'navigation' => [
            'type' => 'navigation',
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
            'props' => [],
        ],
        'props' => [
            'version' => '1.0.0',
        ],
    ]);
});

it('keeps table widget source and column contracts stable', function (): void {
    $compiled = TableWidgetSchema::make()
        ->key('users')
        ->title('Users')
        ->source(UserSource::class)
        ->tableColumns([
            [
                'key' => 'id',
                'label' => 'ID',
                'sortable' => true,
            ],
        ])
        ->rowKey('id')
        ->compile(
            BuilderRegistryFactory::make(),
        );

    expect($compiled)->toBe([
        'type' => 'table-widget',
        'title' => 'Users',
        'description' => '',
        'icon' => null,
        'visible' => true,
        'width' => null,
        'columns' => null,
        'props' => [],
        'key' => 'users',
        'source' => 'user',
        'tableColumns' => [
            [
                'key' => 'id',
                'label' => 'ID',
                'sortable' => true,
                'searchable' => false,
                'width' => null,
                'align' => 'start',
                'format' => null,
                'visible' => true,
            ],
        ],
        'rowKey' => 'id',
    ]);
});
