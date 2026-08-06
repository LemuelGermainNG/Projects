<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Select\SelectSchema;
use App\Core\Schema\Form\Option\OptionSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a select input', function (): void {
    $input = SelectSchema::make()
        ->name('role')
        ->options([
            'admin' => 'Administrator',
            'user' => 'User',
        ])
        ->multiple(true)
        ->searchable(true);

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'select',
        'name'=> 'role',
        'value' => null,

        'placeholder' => '',

        'disabled' => false,

        'readonly' => false,

        'options' => [
            'admin' => 'Administrator',
            'user' => 'User',
        ],

        'multiple' => true,

        'searchable' => true,

        'props' => [],
    ]);
});


it('compiles select options from option schemas', function (): void {
    $select = SelectSchema::make()
        ->options([
            OptionSchema::make()
                ->value('admin')
                ->label('Administrator'),

            OptionSchema::make()
                ->value('user')
                ->label('User'),
        ]);

    expect(
        $select->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'select',

        'options' => [
            [
                'type' => 'option',

                'value' => 'admin',

                'label' => 'Administrator',

                'description' => '',

                'disabled' => false,

                'props' => [],
            ],

            [
                'type' => 'option',

                'value' => 'user',

                'label' => 'User',

                'description' => '',

                'disabled' => false,

                'props' => [],
            ],
        ],
    ]);
});
