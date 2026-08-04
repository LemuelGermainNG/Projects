<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Form\Field\FieldSchema;

it('creates a field schema', function (): void {
    expect(
        FieldSchema::make(),
    )->toBeInstanceOf(FieldSchema::class);
});

it('sets field properties', function (): void {
    $field = FieldSchema::make()
        ->name('name')
        ->label('Name')
        ->description('User name')
        ->child(
            TextSchema::make()
                ->value('John Doe'),
        );

    expect($field->name())
        ->toBe('name');

    expect($field->label())
        ->toBe('Name');

    expect($field->description())
        ->toBe('User name');

    expect($field->child())
        ->toBeInstanceOf(TextSchema::class);
});

it('is immutable', function (): void {
    $field = FieldSchema::make();

    $updated = $field
        ->name('name');

    expect($updated)
        ->not->toBe($field);

    expect($field->name())
        ->toBe('');

    expect($updated->name())
        ->toBe('name');
});
