<?php

declare(strict_types=1);

use App\Core\Schema\Element\Icon\IconSchema;
use App\Core\Support\Enum\Color;
use App\Core\Support\Enum\Icons\Heroicons;

it('creates an icon schema', function (): void {
    expect(
        IconSchema::make(),
    )->toBeInstanceOf(IconSchema::class);
});

it('sets icon properties', function (): void {
    $icon = IconSchema::make()
        ->icon(Heroicons::Users)
        ->color(Color::Primary);

    expect($icon->icon())
        ->toBe(Heroicons::Users);

    expect($icon->color())
        ->toBe(Color::Primary);
});

it('is immutable', function (): void {
    $icon = IconSchema::make();

    $updated = $icon
        ->icon(Heroicons::Users)
        ->color(Color::Primary);

    expect($updated)
        ->not->toBe($icon);

    expect($icon->icon())
        ->toBeNull();

    expect($updated->icon())
        ->toBe(Heroicons::Users);

    expect($updated->color())
        ->toBe(Color::Primary);
});
