<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Email\EmailInputSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an email input', function (): void {
    $input = EmailInputSchema::make()
        ->name('email')
        ->value('john@example.com')
        ->placeholder('Email address');

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'email-input',
        'name'=> 'email',
        'value' => 'john@example.com',

        'placeholder' => 'Email address',

        'disabled' => false,

        'readonly' => false,

        'props' => [],
    ]);
});
