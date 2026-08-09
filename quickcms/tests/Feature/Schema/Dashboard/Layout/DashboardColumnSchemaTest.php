<?php

declare(strict_types=1);

use App\Core\Schema\Dashboard\Layout\DashboardColumnSchema;
use App\Core\Schema\Widget\WidgetSchema;

it('creates a dashboard column schema', function (): void {
    expect(
        DashboardColumnSchema::make(),
    )->toBeInstanceOf(DashboardColumnSchema::class);
});

it('sets dashboard column properties', function (): void {
    $widget = WidgetSchema::make()
        ->key('revenue')
        ->title('Revenue');

    $column = DashboardColumnSchema::make()
        ->widget($widget)
        ->width(6)
        ->props([
            'class' => 'revenue-column',
        ]);

    expect($column->widgetValue())
        ->toBe($widget);

    expect($column->hasWidget())
        ->toBeTrue();

    expect($column->widthValue())
        ->toBe(6);

    expect($column->props())
        ->toBe([
            'class' => 'revenue-column',
        ]);
});

it('sets responsive column width', function (): void {
    $column = DashboardColumnSchema::make()
        ->width([
            'default' => 12,
            'sm' => 12,
            'md' => 6,
            'lg' => 4,
        ]);

    expect($column->widthValue())
        ->toBe([
            'default' => 12,
            'sm' => 12,
            'md' => 6,
            'lg' => 4,
        ]);
});

it('is immutable', function (): void {
    $column = DashboardColumnSchema::make();

    $widget = WidgetSchema::make()
        ->key('revenue');

    $updated = $column
        ->widget($widget)
        ->width(6)
        ->props([
            'class' => 'revenue-column',
        ]);

    expect($updated)
        ->not->toBe($column);

    expect($column->widgetValue())
        ->toBeNull();

    expect($column->hasWidget())
        ->toBeFalse();

    expect($column->widthValue())
        ->toBeNull();

    expect($column->props())
        ->toBe([]);

    expect($updated->widgetValue())
        ->toBe($widget);

    expect($updated->hasWidget())
        ->toBeTrue();

    expect($updated->widthValue())
        ->toBe(6);

    expect($updated->props())
        ->toBe([
            'class' => 'revenue-column',
        ]);
});
