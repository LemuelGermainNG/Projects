<?php

declare(strict_types=1);

use App\Core\Schema\Dashboard\Layout\DashboardColumnSchema;
use App\Core\Schema\Widget\WidgetSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an empty dashboard column', function (): void {
    expect(
        DashboardColumnSchema::make()->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'dashboard-column',

        'width' => null,

        'widget' => null,

        'props' => [],
    ]);
});

it('compiles a dashboard column with a widget', function (): void {
    $column = DashboardColumnSchema::make()
        ->width(6)
        ->widget(
            WidgetSchema::make()
                ->key('revenue')
                ->title('Revenue'),
        )
        ->props([
            'class' => 'revenue-column',
        ]);

    expect(
        $column->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'dashboard-column',

        'width' => 6,

        'widget' => [
            'type' => 'widget',
            'title' => 'Revenue',
            'description' => '',
            'icon' => null,
            'visible' => true,
            'width' => null,
            'columns' => null,
            'props' => [],
            'key' => 'revenue',
        ],

        'props' => [
            'class' => 'revenue-column',
        ],
    ]);
});
