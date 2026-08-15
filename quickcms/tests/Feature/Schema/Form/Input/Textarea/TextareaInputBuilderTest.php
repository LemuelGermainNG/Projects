<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Textarea\TextareaInputSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a textarea input', function (): void {
    $input = TextareaInputSchema::make()
        ->name('description')
        ->value('Lorem ipsum')
        ->rows(5)
        ->cols(50)
        ->autosize();

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'textarea-input',
        'name' => 'description',
        'value' => 'Lorem ipsum',

        'placeholder' => '',

        'disabled' => false,

        'readonly' => false,

        'rows' => 5,

        'cols' => 50,

        'autosize' => true,

        'props' => [],
    ]);
});
