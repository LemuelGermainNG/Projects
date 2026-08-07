<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Text\TextInputSchema;
use Tests\Support\Assertions\ValidationAssertions;
use Tests\Support\Builders\ValidationBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('creates a text input', function (): void {
    expect(
        TextInputSchema::make(),
    )->toBeInstanceOf(TextInputSchema::class);
});

it('sets properties', function (): void {
    $input = TextInputSchema::make()
        ->value('John Doe')
        ->placeholder('Enter your name')
        ->readonly(true)
        ->disabled(true);

    expect($input->value())
        ->toBe('John Doe');

    expect($input->placeholder())
        ->toBe('Enter your name');

    expect($input->readonly())
        ->toBeTrue();

    expect($input->disabled())
        ->toBeTrue();
});

it('is immutable', function (): void {
    $input = TextInputSchema::make();

    $updated = $input
        ->placeholder('Name');

    expect($updated)
        ->not->toBe($input);

    expect($input->placeholder())
        ->toBe('');

    expect($updated->placeholder())
        ->toBe('Name');
});

it('compiles validation rules', function (): void {
    $input = TextInputSchema::make()
        ->name('email')
        ->validation(
            ValidationBuilderFactory::email(),
        );

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'validation' => ValidationAssertions::email(),
    ]);
});
