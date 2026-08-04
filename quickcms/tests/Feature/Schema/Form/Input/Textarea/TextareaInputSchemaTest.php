<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Textarea\TextareaInputSchema;

it('creates a textarea input', function (): void {
    expect(
        TextareaInputSchema::make(),
    )->toBeInstanceOf(TextareaInputSchema::class);
});

it('sets properties', function (): void {
    $input = TextareaInputSchema::make()
        ->rows(5)
        ->cols(50)
        ->autosize(true);

    expect($input->rows())
        ->toBe(5);

    expect($input->cols())
        ->toBe(50);

    expect($input->autosize())
        ->toBeTrue();
});
