<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Text\TextInputSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a text input', function (): void {
    $input = TextInputSchema::make()
        ->name('name')
        ->value('John Doe')
        ->placeholder('Enter your name')
        ->readonly(true)
        ->disabled(true);

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'text-input',
        'name'=> 'name',
        'value' => 'John Doe',

        'placeholder' => 'Enter your name',

        'disabled' => true,

        'readonly' => true,

        'props' => [],
    ]);
});
