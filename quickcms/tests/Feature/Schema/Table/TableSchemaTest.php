<?php

declare(strict_types=1);

use App\Core\Schema\Table\Column\ColumnSchema;
use App\Core\Schema\Table\TableSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates a table schema', function (): void {
    expect(
        TableSchema::make(),
    )->toBeInstanceOf(TableSchema::class);
});

it('sets table properties', function (): void {
    $table = TableSchema::make()
        ->source(UserSource::class)
        ->schema([
            ColumnSchema::make(),
        ]);

    expect($table->source())
        ->toBe(UserSource::class);

    expect($table->schema())
        ->toHaveCount(1);
});

it('is immutable', function (): void {
    $table = TableSchema::make();

    $updated = $table
        ->source(UserSource::class);

    expect($updated)
        ->not->toBe($table);

    expect($table->source())
        ->toBeNull();

    expect($updated->source())
        ->toBe(UserSource::class);
});
