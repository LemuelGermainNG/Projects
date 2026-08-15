<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Password\PasswordInputSchema;
use App\Core\Schema\Form\Input\Text\TextInputSchema;

it('treats boolean methods without arguments as enabling the option', function (): void {
    $schema = PasswordInputSchema::make()
        ->revealable();

    expect($schema->isRevealable())->toBeTrue();

    $schema = $schema->revealable(false);

    expect($schema)
        ->toBeInstanceOf(PasswordInputSchema::class)
        ->and($schema->isRevealable())
        ->toBeFalse();
});

it('preserves closures for dynamic boolean options', function (): void {
    $schema = TextInputSchema::make()
        ->disabled(fn (): bool => true)
        ->readonly(fn (): bool => false);

    expect($schema->isDisabled())
        ->toBeInstanceOf(Closure::class)
        ->and($schema->isReadonly())
        ->toBeInstanceOf(Closure::class);
});
