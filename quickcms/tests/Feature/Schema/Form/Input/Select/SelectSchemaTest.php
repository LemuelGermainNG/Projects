<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Select\SelectSchema;

it('creates a select input', function (): void {
    expect(
        SelectSchema::make(),
    )->toBeInstanceOf(SelectSchema::class);
});

it('sets properties', function (): void {
    $input = SelectSchema::make()
        ->options([
            'admin' => 'Administrator',
            'user' => 'User',
        ])
        ->multiple(true)
        ->searchable(true);

    expect($input->options())
        ->toBe([
            'admin' => 'Administrator',
            'user' => 'User',
        ]);

    expect($input->isMultiple())
        ->toBeTrue();

    expect($input->isSearchable())
        ->toBeTrue();
});
