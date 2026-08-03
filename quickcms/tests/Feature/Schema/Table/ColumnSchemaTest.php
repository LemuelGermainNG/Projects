<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Table\Column\ColumnSchema;

it('creates a column schema', function (): void {
    expect(
        ColumnSchema::make(),
    )->toBeInstanceOf(ColumnSchema::class);
});

it('sets column properties', function (): void {
    $column = ColumnSchema::make()
        ->label('Name')
        ->description('User name')
        ->child(
            TextSchema::make()
                ->value('John Doe'),
        );

    expect($column->label())
        ->toBe('Name');

    expect($column->description())
        ->toBe('User name');

    expect($column->child())
        ->toBeInstanceOf(TextSchema::class);
});

it('is immutable', function (): void {
    $column = ColumnSchema::make();

    $updated = $column
        ->label('Name');

    expect($updated)
        ->not->toBe($column);

    expect($column->label())
        ->toBe('');

    expect($updated->label())
        ->toBe('Name');
});
