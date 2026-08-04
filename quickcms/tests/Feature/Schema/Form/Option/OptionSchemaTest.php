<?php

declare(strict_types=1);

use App\Core\Schema\Form\Option\OptionSchema;

it('creates an option', function (): void {
    expect(
        OptionSchema::make(),
    )->toBeInstanceOf(OptionSchema::class);
});

it('sets properties', function (): void {
    $option = OptionSchema::make()
        ->value('admin')
        ->label('Administrator')
        ->description('Full access')
        ->icon('heroicon-o-shield-check');

    expect($option->value())
        ->toBe('admin');

    expect($option->label())
        ->toBe('Administrator');

    expect($option->description())
        ->toBe('Full access');

    expect($option->icon())
        ->toBe('heroicon-o-shield-check');
});

it('is immutable', function (): void {
    $option = OptionSchema::make();

    $updated = $option
        ->label('Administrator');

    expect($updated)
        ->not->toBe($option);

    expect($option->label())
        ->toBe('');

    expect($updated->label())
        ->toBe('Administrator');
});
