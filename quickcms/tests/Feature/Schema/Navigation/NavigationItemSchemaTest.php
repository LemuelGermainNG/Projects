<?php

declare(strict_types=1);

use App\Core\Schema\Navigation\NavigationItemSchema;

it('creates a navigation item schema', function (): void {
    expect(
        NavigationItemSchema::make(),
    )->toBeInstanceOf(NavigationItemSchema::class);
});

it('sets navigation item properties', function (): void {
    $item = NavigationItemSchema::make()
        ->label('Users')
        ->icon('heroicon-o-users')
        ->route('users.index')
        ->url('/users')
        ->badge('12')
        ->visible(true)
        ->children([
            NavigationItemSchema::make()
                ->label('Profile')
                ->route('users.profile'),
        ])
        ->props([
            'foo' => 'bar',
        ]);

    expect($item->label())->toBe('Users')
        ->and($item->icon())->toBe('heroicon-o-users')
        ->and($item->route())->toBe('users.index')
        ->and($item->url())->toBe('/users')
        ->and($item->badge())->toBe('12')
        ->and($item->isVisible())->toBeTrue()
        ->and($item->children())->toHaveCount(1)
        ->and($item->props())->toBe([
            'foo' => 'bar',
        ]);
});

it('is immutable', function (): void {
    $item = NavigationItemSchema::make();

    $updated = $item->label('Users');

    expect($updated)
        ->not->toBe($item);

    expect($item->label())
        ->toBe('');
});
