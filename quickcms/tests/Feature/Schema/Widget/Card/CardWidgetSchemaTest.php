<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Card\CardWidgetSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates a card schema', function (): void {
    expect(
        CardWidgetSchema::make(),
    )->toBeInstanceOf(CardWidgetSchema::class);
});

it('inherits widget configuration', function (): void {
    $card = CardWidgetSchema::make()
        ->key('users')
        ->title('Users')
        ->description('Manage users')
        ->icon('heroicon-o-users')
        ->visible(false)
        ->width(6)
        ->columns([
            'default' => 1,
            'md' => 2,
        ])
        ->props([
            'refresh' => true,
        ]);

    expect($card->widgetKey())
        ->toBe('users');

    expect($card->title())
        ->toBe('Users');

    expect($card->description())
        ->toBe('Manage users');

    expect($card->icon())
        ->toBe('heroicon-o-users');

    expect($card->visible())
        ->toBeFalse();

    expect($card->width())
        ->toBe(6);

    expect($card->columns())
        ->toBe([
            'default' => 1,
            'md' => 2,
        ]);

    expect($card->props())
        ->toBe([
            'refresh' => true,
        ]);
});

it('inherits source', function (): void {
    $card = CardWidgetSchema::make()
        ->source(UserSource::class);

    expect($card->source())
        ->toBe(UserSource::class);
});

it('is immutable', function (): void {
    $card = CardWidgetSchema::make();

    $updated = $card
        ->key('users')
        ->title('Users')
        ->source(UserSource::class)
        ->width(6);

    expect($updated)
        ->not->toBe($card);

    expect($card->widgetKey())
        ->toBeNull();

    expect($card->title())
        ->toBe('');

    expect($card->source())
        ->toBeNull();

    expect($card->width())
        ->toBeNull();

    expect($updated->widgetKey())
        ->toBe('users');

    expect($updated->title())
        ->toBe('Users');

    expect($updated->source())
        ->toBe(UserSource::class);

    expect($updated->width())
        ->toBe(6);
});
