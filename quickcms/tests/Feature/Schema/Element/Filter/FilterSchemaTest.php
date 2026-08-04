<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Element\Filter\FilterSchema;

it('creates a filter schema', function (): void {
    expect(
        FilterSchema::make(),
    )->toBeInstanceOf(FilterSchema::class);
});

it('sets filter properties', function (): void {
    $filter = FilterSchema::make()
        ->name('status')
        ->label('Status')
        ->description('Filter by status')
        ->child(
            TextSchema::make()
                ->value('Active'),
        );

    expect($filter->name())
        ->toBe('status');

    expect($filter->label())
        ->toBe('Status');

    expect($filter->description())
        ->toBe('Filter by status');

    expect($filter->child())
        ->toBeInstanceOf(TextSchema::class);
});

it('is immutable', function (): void {
    $filter = FilterSchema::make();

    $updated = $filter
        ->name('status');

    expect($updated)
        ->not->toBe($filter);

    expect($filter->name())
        ->toBe('');

    expect($updated->name())
        ->toBe('status');
});
