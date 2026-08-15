<?php

declare(strict_types=1);

use App\Core\Schema\Navigation\NavigationItemSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('creates a navigation item schema', function (): void {
    expect(
        NavigationItemSchema::make(),
    )->toBeInstanceOf(NavigationItemSchema::class);
});

it('compiles a navigation item schema', function (): void {
    $item = NavigationItemSchema::make()
        ->label('Users')
        ->icon('heroicon-o-users')
        ->route('users')
        ->url('/users')
        ->badge('12')
        ->visible()
        ->props([
            'foo' => 'bar',
        ]);

    expect(
        $item->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'label' => 'Users',
        'icon' => 'heroicon-o-users',
        'route' => 'users',
        'url' => '/users',
        'badge' => '12',
        'visible' => true,
        'children' => [],
        'props' => [
            'foo' => 'bar',
        ],
    ]);
});

it('compiles nested navigation items', function (): void {
    $item = NavigationItemSchema::make()
        ->label('Administration')
        ->children([
            NavigationItemSchema::make()
                ->label('Users')
                ->route('users'),

            NavigationItemSchema::make()
                ->label('Roles')
                ->route('roles'),
        ]);

    expect(
        $item->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'label' => 'Administration',
        'icon' => null,
        'route' => null,
        'url' => null,
        'badge' => null,
        'visible' => true,

        'children' => [
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
            [
                'label' => 'Roles',
                'icon' => null,
                'route' => 'roles',
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

it('is immutable', function (): void {
    $item = NavigationItemSchema::make();

    $updated = $item->label('Users');

    expect($updated)
        ->not->toBe($item);
});
