<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Checkbox\CheckboxSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a checkbox', function (): void {
    $checkbox = CheckboxSchema::make()
        ->name('accepted')
        ->checked()
        ->inline();

    expect(
        $checkbox->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'checkbox',

        'name'=> 'accepted',

        'value' => null,

        'placeholder' => '',

        'disabled' => false,

        'readonly' => false,

        'checked' => true,

        'inline' => true,

        'props' => [],
    ]);
});
