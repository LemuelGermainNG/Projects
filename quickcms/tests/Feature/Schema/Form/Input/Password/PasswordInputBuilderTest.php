<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Password\PasswordInputSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a password input', function (): void {
    $input = PasswordInputSchema::make()
        ->name('password')
        ->value('secret')
        ->placeholder('Password')
        ->readonly()
        ->disabled();

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'password-input',
        'name' => 'password',
        'value' => 'secret',

        'placeholder' => 'Password',

        'disabled' => true,

        'readonly' => true,

        'props' => [],
    ]);
});
