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
        ->items([
            NavigationItemSchema::make()
                ->label('Users')
                ->route('users'),
        ])
        ->props([
            'foo' => 'bar',
        ]);

    expect(
        $navigation->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'navigation',

        'items' => [
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

        'props' => [
            'foo' => 'bar',
        ],
    ]);
});

it('is immutable', function (): void {
    $navigation = NavigationSchema::make();

    $updated = $navigation->items([]);

    expect($updated)
        ->not->toBe($navigation);
});
