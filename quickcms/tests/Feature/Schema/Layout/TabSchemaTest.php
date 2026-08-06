<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Tabs\TabSchema;
use App\Core\Support\Enum\Icons\Heroicons;

it('creates a tab schema', function (): void {
    expect(
        TabSchema::make(),
    )->toBeInstanceOf(TabSchema::class);
});

it('sets tab properties', function (): void {
    $tab = TabSchema::make()
        ->label('Users')
        ->icon(Heroicons::Users)
        ->visible(true)
        ->disabled(false)
        ->child(
            HeaderSchema::make()
                ->title('Users'),
        )
        ->props([
            'lazy' => true,
        ]);

    expect($tab->label())
        ->toBe('Users');

    expect($tab->icon())
        ->toBe(Heroicons::Users);

    expect($tab->visible())
        ->toBeTrue();

    expect($tab->disabled())
        ->toBeFalse();

    expect($tab->child())
        ->toBeInstanceOf(HeaderSchema::class);

    expect($tab->props())
        ->toBe([
            'lazy' => true,
        ]);
});

it('is immutable', function (): void {
    $tab = TabSchema::make();

    $updated = $tab->label('Users');

    expect($updated)
        ->not->toBe($tab);

    // Valeur par défaut de HasLabel
    expect($tab->label())
        ->toBe('');

    expect($updated->label())
        ->toBe('Users');
});
