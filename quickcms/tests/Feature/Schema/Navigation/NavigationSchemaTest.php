<?php

declare(strict_types=1);

use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;

it('creates a navigation schema', function (): void {
    expect(
        NavigationSchema::make(),
    )->toBeInstanceOf(NavigationSchema::class);
});

it('sets navigation properties', function (): void {
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

    expect($navigation->label())->toBe('Administration')
        ->and($navigation->icon())->toBe('heroicon-o-cog')
        ->and($navigation->items())->toHaveCount(1)
        ->and($navigation->props())->toBe([
            'foo' => 'bar',
        ]);
});

it('is immutable', function (): void {
    $navigation = NavigationSchema::make();

    $updated = $navigation->label('Administration');

    expect($updated)
        ->not->toBe($navigation);

    expect($navigation->label())
        ->toBe('');
});
