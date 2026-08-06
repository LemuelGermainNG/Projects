<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Number\NumberInputSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a number input', function (): void {
    $input = NumberInputSchema::make()
        ->name('age')
        ->value(42)
        ->min(0)
        ->max(100)
        ->step(1);

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'number-input',
        'name'=> 'age',
        'value' => 42,

        'placeholder' => '',

        'disabled' => false,

        'readonly' => false,

        'min' => 0,

        'max' => 100,

        'step' => 1,

        'props' => [],
    ]);
});
