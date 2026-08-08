<?php

declare(strict_types=1);

use App\Core\Schema\Form\Field\FieldSchema;
use App\Core\Schema\Form\FormSchema;
use App\Core\Schema\Form\Input\Text\TextInputSchema;
use App\Core\Schema\Form\State\State;
use App\Core\Schema\Form\Validation\Validation;
use Tests\Fixtures\Sources\UserSource;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a complete form with input state and validation', function (): void {
    $form = FormSchema::make()
        ->source(UserSource::class)
        ->schema([
            FieldSchema::make()
                ->name('name')
                ->label('Name')
                ->child(
                    TextInputSchema::make()
                        ->name('name')
                        ->value('John Doe')
                        ->state(
                            State::make()
                                ->path('name')
                                ->default('John Doe')
                                ->hydrate(
                                    fn (mixed $value): string => trim((string) $value),
                                )
                                ->dehydrate(
                                    fn (mixed $value): string => mb_strtolower((string) $value),
                                ),
                        )
                        ->validation(
                            Validation::make()
                                ->required()
                                ->string()
                                ->min(3)
                                ->max(255),
                        ),
                ),
        ]);

    expect(
        $form->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'form',

        'source' => UserSource::class,

        'schema' => [
            [
                'type' => 'field',

                'name' => 'name',

                'label' => 'Name',

                'description' => '',

                'child' => [
                    'type' => 'text-input',

                    'name' => 'name',

                    'value' => 'John Doe',

                    'placeholder' => '',

                    'disabled' => false,

                    'readonly' => false,

                    'props' => [],

                    'state' => [
                        'path' => 'name',

                        'default' => 'John Doe',

                        'hydrate' => true,

                        'dehydrate' => true,
                    ],

                    'validation' => [
                        'rules' => [
                            [
                                'type' => 'required',
                            ],

                            [
                                'type' => 'string',
                            ],

                            [
                                'type' => 'min',

                                'parameters' => [
                                    'value' => 3,
                                ],
                            ],

                            [
                                'type' => 'max',

                                'parameters' => [
                                    'value' => 255,
                                ],
                            ],
                        ],
                    ],
                ],

                'props' => [],
            ],
        ],

        'props' => [],
    ]);
});

it('keeps the form schema immutable', function (): void {
    $form = FormSchema::make();

    $updated = $form
        ->source(UserSource::class)
        ->schema([
            FieldSchema::make()
                ->name('name')
                ->label('Name')
                ->child(
                    TextInputSchema::make()
                        ->name('name'),
                ),
        ]);

    expect($updated)
        ->not->toBe($form);

    expect($form->source())
        ->toBeNull();

    expect($form->schema())
        ->toBe([]);
});
