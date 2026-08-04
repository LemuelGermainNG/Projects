<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Phone\PhoneInputSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a phone input', function (): void {
    $input = PhoneInputSchema::make()
        ->value('+33 6 12 34 56 78')
        ->placeholder('Phone number')
        ->mask('+99 9 99 99 99 99');

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'phone-input',

        'value' => '+33 6 12 34 56 78',

        'placeholder' => 'Phone number',

        'disabled' => false,

        'readonly' => false,

        'mask' => '+99 9 99 99 99 99',

        'props' => [],
    ]);
});
