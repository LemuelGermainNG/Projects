<?php

declare(strict_types=1);

use App\Core\Schema\Layout\Tabs\TabSchema;
use App\Core\Schema\Layout\Tabs\TabsSchema;

it('creates a tabs schema', function (): void {
    expect(
        TabsSchema::make(),
    )->toBeInstanceOf(TabsSchema::class);
});

it('sets tabs', function (): void {
    $tabs = TabsSchema::make()
        ->children([
            TabSchema::make()->label('Users'),
            TabSchema::make()->label('Roles'),
        ])
        ->props([
            'lazy' => true,
        ]);

    expect($tabs->tabs())
        ->toHaveCount(2);

    expect($tabs->tabs()[0]->label())
        ->toBe('Users');

    expect($tabs->tabs()[1]->label())
        ->toBe('Roles');

    expect($tabs->props())
        ->toBe([
            'lazy' => true,
        ]);
});

it('is immutable', function (): void {
    $tabs = TabsSchema::make();

    $updated = $tabs->children([
        TabSchema::make()
            ->label('Users'),
    ]);

    expect($updated)
        ->not->toBe($tabs);

    expect($tabs->tabs())
        ->toBe([]);

    expect($updated->tabs())
        ->toHaveCount(1);
});
