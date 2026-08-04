<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Form\Field\FieldSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a field schema', function (): void {
    $field = FieldSchema::make()
        ->name('name')
        ->label('Name')
        ->description('User name')
        ->child(
            TextSchema::make()
                ->value('John Doe'),
        );

    expect(
        $field->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'field',

        'name' => 'name',

        'label' => 'Name',

        'description' => 'User name',

        'child' => [
            'type' => 'text',

            'value' => 'John Doe',

            'color' => 'primary',

            'props' => [],
        ],

        'props' => [],
    ]);
});
