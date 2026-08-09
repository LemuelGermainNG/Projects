<?php

declare(strict_types=1);

use App\Core\Schema\Widget\Table\TableWidgetSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates a table schema', function (): void {
    expect(
        TableWidgetSchema::make(),
    )->toBeInstanceOf(TableWidgetSchema::class);
});

it('sets table columns', function (): void {
    $columns = [
        [
            'key' => 'name',
            'label' => 'Name',
        ],
        [
            'key' => 'email',
            'label' => 'Email',
        ],
    ];

    $table = TableWidgetSchema::make()
        ->tableColumns($columns);

    expect($table->tableColumnsValue())
        ->toBe($columns);
});

it('sets advanced table columns', function (): void {
    $columns = [
        [
            'key' => 'name',
            'label' => 'Name',
            'sortable' => true,
            'searchable' => true,
            'width' => 240,
            'align' => 'start',
            'format' => 'text',
            'visible' => true,
        ],
        [
            'key' => 'email',
            'label' => 'Email',
            'sortable' => true,
            'searchable' => true,
            'width' => 320,
            'align' => 'start',
            'format' => 'email',
            'visible' => false,
        ],
    ];

    $table = TableWidgetSchema::make()
        ->tableColumns($columns);

    expect($table->tableColumnsValue())
        ->toBe($columns);
});

it('sets row key', function (): void {
    $table = TableWidgetSchema::make()
        ->rowKey('id');

    expect($table->rowKeyValue())
        ->toBe('id');
});

it('inherits widget configuration', function (): void {
    $table = TableWidgetSchema::make()
        ->key('users')
        ->title('Users')
        ->description('User list')
        ->icon('heroicon-o-users')
        ->visible(false)
        ->width(12)
        ->columns([
            'default' => 1,
        ])
        ->props([
            'striped' => true,
        ]);

    expect($table->widgetKey())
        ->toBe('users');

    expect($table->title())
        ->toBe('Users');

    expect($table->description())
        ->toBe('User list');

    expect($table->icon())
        ->toBe('heroicon-o-users');

    expect($table->visible())
        ->toBeFalse();

    expect($table->width())
        ->toBe(12);

    expect($table->columns())
        ->toBe([
            'default' => 1,
        ]);

    expect($table->props())
        ->toBe([
            'striped' => true,
        ]);
});

it('inherits source', function (): void {
    $table = TableWidgetSchema::make()
        ->source(UserSource::class);

    expect($table->source())
        ->toBe(UserSource::class);
});

it('is immutable', function (): void {
    $table = TableWidgetSchema::make();

    $columns = [
        [
            'key' => 'name',
            'label' => 'Name',
            'sortable' => true,
            'searchable' => true,
            'width' => 240,
            'align' => 'start',
            'format' => 'text',
            'visible' => true,
        ],
    ];

    $updated = $table
        ->key('users')
        ->title('Users')
        ->tableColumns($columns)
        ->rowKey('id')
        ->source(UserSource::class);

    expect($updated)
        ->not->toBe($table);

    expect($table->widgetKey())
        ->toBeNull();

    expect($table->title())
        ->toBe('');

    expect($table->tableColumnsValue())
        ->toBeNull();

    expect($table->rowKeyValue())
        ->toBeNull();

    expect($table->source())
        ->toBeNull();

    expect($updated->widgetKey())
        ->toBe('users');

    expect($updated->title())
        ->toBe('Users');

    expect($updated->tableColumnsValue())
        ->toBe($columns);

    expect($updated->rowKeyValue())
        ->toBe('id');

    expect($updated->source())
        ->toBe(UserSource::class);
});
