<?php

declare(strict_types=1);

use App\Core\Schema\Action\ActionSchema;
use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Form\Field\FieldSchema;
use App\Core\Schema\Form\FormSchema;
use Tests\Fixtures\Sources\UserSource;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a form schema', function (): void {
    $form = FormSchema::make()
        ->source(UserSource::class)

        ->schema([
            FieldSchema::make()
                ->name('name')
                ->label('Name')
                ->child(
                    TextSchema::make()
                        ->value('John Doe'),
                ),
        ])

        ->headerActions([
            ActionSchema::make()
                ->label('Cancel'),
        ])

        ->footerActions([
            ActionSchema::make()
                ->label('Save'),
        ]);

    expect(
        $form->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'form',

        'source' => UserSource::class,

        'schema' => [
            [
                'type' => 'field',

                'name' => 'name',

                'label' => 'Name',

                'description' => '',

                'child' => [
                    'type' => 'text',

                    'value' => 'John Doe',

                    'color' => 'primary',

                    'props' => [],
                ],

                'props' => [],
            ],
        ],

        'headerActions' => [
            ActionSchema::make()
                ->label('Cancel')
                ->compile(
                    BuilderRegistryFactory::make(),
                ),
        ],

        'footerActions' => [
            ActionSchema::make()
                ->label('Save')
                ->compile(
                    BuilderRegistryFactory::make(),
                ),
        ],

        'props' => [],
    ]);
});
