<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Element\Filter\FilterSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a filter schema', function (): void {
    $filter = FilterSchema::make()
        ->name('status')
        ->label('Status')
        ->description('Filter by status')
        ->child(
            TextSchema::make()
                ->value('Active'),
        );

    expect(
        $filter->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'filter',

        'name' => 'status',

        'label' => 'Status',

        'description' => 'Filter by status',

        'child' => [
            'type' => 'text',

            'value' => 'Active',

            'color' => 'primary',

            'props' => [],
        ],

        'props' => [],
    ]);
});
