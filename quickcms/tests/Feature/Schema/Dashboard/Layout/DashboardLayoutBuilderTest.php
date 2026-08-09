<?php

declare(strict_types=1);

use App\Core\Schema\Dashboard\Layout\DashboardLayoutSchema;
use App\Core\Schema\Dashboard\Layout\DashboardRowSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an empty dashboard layout', function (): void {
    expect(
        DashboardLayoutSchema::make()->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'dashboard-layout',

        'columns' => null,

        'gap' => null,

        'rows' => [],

        'props' => [],
    ]);
});

it('compiles a dashboard layout', function (): void {
    $layout = DashboardLayoutSchema::make()
        ->columns(12)
        ->gap(6)
        ->rows([
            DashboardRowSchema::make()
                ->gap(4),
        ])
        ->props([
            'fluid' => true,
        ]);

    expect(
        $layout->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'dashboard-layout',

        'columns' => 12,

        'gap' => 6,

        'rows' => [
            [
                'type' => 'dashboard-row',

                'gap' => 4,

                'columns' => [],

                'props' => [],
            ],
        ],

        'props' => [
            'fluid' => true,
        ],
    ]);
});
