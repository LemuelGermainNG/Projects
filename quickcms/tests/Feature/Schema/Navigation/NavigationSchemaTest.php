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
        ->items([
            NavigationItemSchema::make()
                ->label('Users')
                ->route('users'),
        ])
        ->props([
            'foo' => 'bar',
        ]);

    expect($navigation->items())->toHaveCount(1)
        ->and($navigation->props())->toBe([
            'foo' => 'bar',
        ]);
});

it('is immutable', function (): void {
    $navigation = NavigationSchema::make();

    $updated = $navigation->items([]);

    expect($updated)
        ->not->toBe($navigation);

    expect($navigation->items())
        ->toBe([]);
});
