<?php

declare(strict_types=1);

use App\Core\Schema\Dashboard\Layout\DashboardColumnSchema;
use App\Core\Schema\Dashboard\Layout\DashboardRowSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an empty dashboard row', function (): void {
    expect(
        DashboardRowSchema::make()->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'dashboard-row',

        'gap' => null,

        'columns' => [],

        'props' => [],
    ]);
});

it('compiles a dashboard row', function (): void {
    $row = DashboardRowSchema::make()
        ->gap(6)
        ->columns([
            DashboardColumnSchema::make()
                ->width(6),
        ])
        ->props([
            'align' => 'stretch',
        ]);

    expect(
        $row->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'dashboard-row',

        'gap' => 6,

        'columns' => [
            [
                'type' => 'dashboard-column',

                'width' => 6,

                'widget' => null,

                'props' => [],
            ],
        ],

        'props' => [
            'align' => 'stretch',
        ],
    ]);
});
