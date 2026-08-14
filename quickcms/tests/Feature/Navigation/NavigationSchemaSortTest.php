<?php

declare(strict_types=1);

use App\Core\Schema\Navigation\NavigationGroupSchema;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;

it('supports navigation group ids and sort values', function (): void {
    $group = NavigationGroupSchema::make()
        ->id('management')
        ->label('Management')
        ->sort(20);

    expect($group->id())->toBe('management');
    expect($group->sort())->toBe(20);
});

it('supports navigation item group references and sort values', function (): void {
    $item = NavigationItemSchema::make()
        ->group('management')
        ->label('Users')
        ->route('users.index')
        ->sort(10);

    expect($item->group())->toBe('management');
    expect($item->sort())->toBe(10);
});

it('allows navigation declarations to keep groups separate before registry composition', function (): void {
    $schema = NavigationSchema::make()
        ->items([
            NavigationItemSchema::make()
                ->label('Dashboard')
                ->route('dashboard')
                ->sort(10),
        ])
        ->groups([
            NavigationGroupSchema::make()
                ->id('management')
                ->label('Management')
                ->sort(20),
        ]);

    expect($schema->items())->toHaveCount(1);
    expect($schema->groups())->toHaveCount(1);
});

it('supports a unified navigation collection', function (): void {
    $schema = NavigationSchema::make()
        ->items([
            NavigationItemSchema::make()
                ->label('Dashboard')
                ->route('dashboard')
                ->sort(10),

            NavigationGroupSchema::make()
                ->id('management')
                ->label('Management')
                ->sort(20),
        ]);

    expect($schema->items())->toHaveCount(2);
    expect($schema->groups())->toBe([]);
});
