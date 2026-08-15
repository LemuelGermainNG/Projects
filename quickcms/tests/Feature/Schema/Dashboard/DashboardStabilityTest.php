<?php

declare(strict_types=1);

use App\Core\Schema\Action\ActionSchema;
use App\Core\Schema\Dashboard\DashboardSchema;
use App\Core\Schema\Dashboard\Layout\DashboardColumnSchema;
use App\Core\Schema\Dashboard\Layout\DashboardLayoutSchema;
use App\Core\Schema\Dashboard\Layout\DashboardRowSchema;
use App\Core\Schema\Element\Filter\FilterSchema;
use App\Core\Schema\Form\State\StateSchema;
use App\Core\Schema\Widget\Chart\ChartWidgetSchema;
use App\Core\Schema\Widget\Stats\StatsWidgetSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles the complete dashboard contract', function (): void {
    $dashboard = DashboardSchema::make()
        ->title('Sales Dashboard')
        ->description('Sales analytics')
        ->icon('chart')
        ->visible(true)

        ->state(
            StateSchema::make()
                ->path('dashboard')
                ->default([
                    'period' => 'month',
                ])
                ->reactive()
                ->persist(),
        )

        ->filters([
            FilterSchema::make()
                ->name('period')
                ->label('Period'),
        ])

        ->actions([
            ActionSchema::make()
                ->label('Refresh'),
        ])

        ->refresh([
            'enabled' => true,
            'interval' => 30,
        ])

        ->layout(
            DashboardLayoutSchema::make()
                ->columns(12)
                ->gap(6)
                ->rows([
                    DashboardRowSchema::make()
                        ->gap(6)
                        ->columns([
                            DashboardColumnSchema::make()
                                ->width(4)
                                ->widget(
                                    StatsWidgetSchema::make()
                                        ->key('revenue')
                                        ->title('Revenue'),
                                ),

                            DashboardColumnSchema::make()
                                ->width(8)
                                ->widget(
                                    ChartWidgetSchema::make()
                                        ->key('sales')
                                        ->title('Sales'),
                                ),
                        ]),
                ]),
        )

        ->props([
            'fluid' => true,
        ]);

    $compiled = $dashboard->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled)
        ->toMatchArray([
            'type' => 'dashboard',

            'title' => 'Sales Dashboard',

            'description' => 'Sales analytics',

            'icon' => 'chart',

            'visible' => true,

            'refresh' => [
                'enabled' => true,
                'interval' => 30,
            ],

            'props' => [
                'fluid' => true,
            ],
        ]);

    expect($compiled['state'])
        ->toMatchArray([
            'path' => 'dashboard',

            'default' => [
                'period' => 'month',
            ],

            'reactive' => true,

            'persist' => true,
        ]);

    expect($compiled['filters'])
        ->toHaveCount(1);

    expect($compiled['actions'])
        ->toHaveCount(1);

    expect($compiled['layout'])
        ->toMatchArray([
            'type' => 'dashboard-layout',
            'columns' => 12,
            'gap' => 6,
        ]);

    expect($compiled['layout']['rows'])
        ->toHaveCount(1);

    expect($compiled['layout']['rows'][0]['columns'])
        ->toHaveCount(2);

    expect(
        $compiled['layout']['rows'][0]['columns'][0],
    )->toMatchArray([
        'type' => 'dashboard-column',
        'width' => 4,
    ]);

    expect(
        $compiled['layout']['rows'][0]['columns'][0]['widget']['key'],
    )->toBe('revenue');

    expect(
        $compiled['layout']['rows'][1]['columns'][0]['widget']['key'] ?? null,
    )->toBeNull();

    expect(
        $compiled['layout']['rows'][0]['columns'][1]['widget']['key'],
    )->toBe('sales');
});

it('compiles an empty dashboard safely', function (): void {
    $compiled = DashboardSchema::make()->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled)
        ->toMatchArray([
            'type' => 'dashboard',
            'title' => '',
            'description' => '',
            'icon' => null,
            'visible' => true,
            'layout' => null,
            'state' => null,
            'filters' => [],
            'actions' => [],
            'refresh' => null,
            'props' => [],
        ]);
});

it('keeps dashboard immutable', function (): void {
    $dashboard = DashboardSchema::make();

    $updated = $dashboard
        ->title('Dashboard')
        ->description('Description')
        ->visible(false)
        ->refresh(true);

    expect($updated)
        ->not->toBe($dashboard);

    expect($dashboard->title())
        ->toBe('');

    expect($dashboard->description())
        ->toBe('');

    expect($dashboard->isVisible())
        ->toBeTrue();

    expect($dashboard->refreshValue())
        ->toBeNull();

    expect($updated->title())
        ->toBe('Dashboard');

    expect($updated->description())
        ->toBe('Description');

    expect($updated->isVisible())
        ->toBeFalse();

    expect($updated->refreshValue())
        ->toBeTrue();
});
