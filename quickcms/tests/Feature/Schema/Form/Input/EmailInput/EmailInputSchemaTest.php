<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\EmailInput\EmailInputSchema;

it('creates an email input', function (): void {
    expect(
        EmailInputSchema::make(),
    )->toBeInstanceOf(EmailInputSchema::class);
});

it('sets properties', function (): void {
    $input = EmailInputSchema::make()
        ->value('john@example.com')
        ->placeholder('Email address')
        ->readonly(true)
        ->disabled(true);

    expect($input->value())
        ->toBe('john@example.com');

    expect($input->placeholder())
        ->toBe('Email address');

    expect($input->readonly())
        ->toBeTrue();

    expect($input->disabled())
        ->toBeTrue();
});

it('is immutable', function (): void {
    $input = EmailInputSchema::make();

    $updated = $input
        ->placeholder('Email');

    expect($updated)
        ->not->toBe($input);

    expect($input->placeholder())
        ->toBe('');

    expect($updated->placeholder())
        ->toBe('Email');
});
