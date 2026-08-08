<?php

declare(strict_types=1);

use App\Core\Schema\Widget\WidgetSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates a widget schema', function (): void {
    expect(
        WidgetSchema::make(),
    )->toBeInstanceOf(WidgetSchema::class);
});

it('sets a widget key', function (): void {
    $widget = WidgetSchema::make()
        ->key('users');

    expect($widget->widgetKey())
        ->toBe('users');
});

it('sets a widget title', function (): void {
    $widget = WidgetSchema::make()
        ->title('Users');

    expect($widget->title())
        ->toBe('Users');
});

it('sets a widget description', function (): void {
    $widget = WidgetSchema::make()
        ->description('Manage users');

    expect($widget->description())
        ->toBe('Manage users');
});

it('sets a widget icon', function (): void {
    $widget = WidgetSchema::make()
        ->icon('heroicon-o-users');

    expect($widget->icon())
        ->toBe('heroicon-o-users');
});

it('sets widget visibility', function (): void {
    $widget = WidgetSchema::make()
        ->visible(false);

    expect($widget->visible())
        ->toBeFalse();
});

it('sets widget width', function (): void {
    $widget = WidgetSchema::make()
        ->width(6);

    expect($widget->width())
        ->toBe(6);
});

it('sets widget columns', function (): void {
    $widget = WidgetSchema::make()
        ->columns([
            'default' => 1,
            'md' => 2,
        ]);

    expect($widget->columns())
        ->toBe([
            'default' => 1,
            'md' => 2,
        ]);
});

it('sets widget props', function (): void {
    $widget = WidgetSchema::make()
        ->props([
            'refresh' => true,
        ]);

    expect($widget->props())
        ->toBe([
            'refresh' => true,
        ]);
});

it('is immutable', function (): void {
    $widget = WidgetSchema::make();

    $updated = $widget
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
        ])
        ->source(UserSource::class);

    expect($updated)
        ->not->toBe($widget);

    expect($widget->widgetKey())
        ->toBeNull();

    expect($widget->title())
        ->toBe('');

    expect($widget->description())
        ->toBe('');

    expect($widget->icon())
        ->toBeNull();

    expect($widget->visible())
        ->toBeTrue();

    expect($widget->width())
        ->toBeNull();

    expect($widget->columns())
        ->toBeNull();

    expect($widget->props())
        ->toBe([]);

    expect($widget->source())
        ->toBeNull();

    expect($updated->widgetKey())
        ->toBe('users');

    expect($updated->title())
        ->toBe('Users');

    expect($updated->description())
        ->toBe('Manage users');

    expect($updated->icon())
        ->toBe('heroicon-o-users');

    expect($updated->visible())
        ->toBeFalse();

    expect($updated->width())
        ->toBe(6);

    expect($updated->columns())
        ->toBe([
            'default' => 1,
            'md' => 2,
        ]);

    expect($updated->props())
        ->toBe([
            'refresh' => true,
        ]);

    expect($updated->source())
        ->toBe(UserSource::class);
});

it('sets a widget source', function (): void {
    $widget = WidgetSchema::make()
        ->source(UserSource::class);

    expect($widget->source())
        ->toBe(UserSource::class);
});
