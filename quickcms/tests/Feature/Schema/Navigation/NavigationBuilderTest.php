<?php

declare(strict_types=1);

use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('creates a navigation schema', function (): void {
    expect(
        NavigationSchema::make(),
    )->toBeInstanceOf(NavigationSchema::class);
});

it('compiles a navigation schema', function (): void {
    $navigation = NavigationSchema::make()
        ->label('Administration')
        ->icon('heroicon-o-cog')
        ->items([
            NavigationItemSchema::make()
                ->label('Users')
                ->route('users.index'),
        ])
        ->props([
            'foo' => 'bar',
        ]);

    expect(
        $navigation->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'label' => 'Administration',
        'icon' => 'heroicon-o-cog',

        'items' => [
            [
                'label' => 'Users',
                'icon' => null,
                'route' => 'users.index',
                'url' => null,
                'badge' => null,
                'visible' => true,
                'children' => [],
                'props' => [],
            ],
        ],

        'props' => [
            'foo' => 'bar',
        ],
    ]);
});

it('is immutable', function (): void {
    $navigation = NavigationSchema::make();

    $updated = $navigation->label('Administration');

    expect($updated)
        ->not->toBe($navigation);
});
