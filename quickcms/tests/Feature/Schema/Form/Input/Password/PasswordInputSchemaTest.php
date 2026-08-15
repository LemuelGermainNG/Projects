<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Password\PasswordInputSchema;

it('creates a password input', function (): void {
    expect(
        PasswordInputSchema::make(),
    )->toBeInstanceOf(PasswordInputSchema::class);
});

it('sets properties', function (): void {
    $input = PasswordInputSchema::make()
        ->value('secret')
        ->placeholder('Password')
        ->readonly(true)
        ->disabled(true);

    expect($input->value())
        ->toBe('secret');

    expect($input->placeholder())
        ->toBe('Password');

    expect($input->isReadonly())
        ->toBeTrue();

    expect($input->isDisabled())
        ->toBeTrue();
});

it('is immutable', function (): void {
    $input = PasswordInputSchema::make();

    $updated = $input
        ->placeholder('Password');

    expect($updated)
        ->not->toBe($input);

    expect($input->placeholder())
        ->toBe('');

    expect($updated->placeholder())
        ->toBe('Password');
});
