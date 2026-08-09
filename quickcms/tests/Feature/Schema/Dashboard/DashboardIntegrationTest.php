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

it('compiles a complete dashboard', function (): void {
    $dashboard = DashboardSchema::make()
        ->title('Sales Dashboard')
        ->description('Sales analytics')

        ->state(
            StateSchema::make()
                ->path('dashboard')
                ->default([
                    'period' => 'month',
                    'country' => null,
                ])
                ->reactive()
                ->persist(),
        )

        ->filters([
            FilterSchema::make()
                ->name('period')
                ->label('Period'),

            FilterSchema::make()
                ->name('country')
                ->label('Country'),
        ])

        ->actions([
            ActionSchema::make()
                ->label('Refresh'),

            ActionSchema::make()
                ->label('Export'),
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
                                ->width([
                                    'default' => 12,
                                    'md' => 6,
                                    'lg' => 4,
                                ])
                                ->widget(
                                    StatsWidgetSchema::make()
                                        ->key('revenue')
                                        ->title('Revenue'),
                                ),

                            DashboardColumnSchema::make()
                                ->width([
                                    'default' => 12,
                                    'md' => 6,
                                    'lg' => 4,
                                ])
                                ->widget(
                                    StatsWidgetSchema::make()
                                        ->key('orders')
                                        ->title('Orders'),
                                ),

                            DashboardColumnSchema::make()
                                ->width([
                                    'default' => 12,
                                    'md' => 12,
                                    'lg' => 4,
                                ])
                                ->widget(
                                    StatsWidgetSchema::make()
                                        ->key('customers')
                                        ->title('Customers'),
                                ),
                        ]),

                    DashboardRowSchema::make()
                        ->columns([
                            DashboardColumnSchema::make()
                                ->width(12)
                                ->widget(
                                    ChartWidgetSchema::make()
                                        ->key('sales')
                                        ->title('Sales'),
                                ),
                        ]),
                ]),
        );

    $compiled = $dashboard->compile(
        BuilderRegistryFactory::make(),
    );

    /*
     * Dashboard
     */
    expect($compiled['type'])
        ->toBe('dashboard');

    expect($compiled['title'])
        ->toBe('Sales Dashboard');

    expect($compiled['description'])
        ->toBe('Sales analytics');

    /*
     * Dashboard context
     */
    expect($compiled['state'])
        ->toMatchArray([
            'path' => 'dashboard',

            'default' => [
                'period' => 'month',
                'country' => null,
            ],

            'reactive' => true,

            'persist' => true,
        ]);

    expect($compiled['filters'])
        ->toHaveCount(2);

    expect($compiled['actions'])
        ->toHaveCount(2);

    expect($compiled['refresh'])
        ->toBe([
            'enabled' => true,
            'interval' => 30,
        ]);

    /*
     * Dashboard layout
     */
    expect($compiled['layout'])
        ->toMatchArray([
            'type' => 'dashboard-layout',

            'columns' => 12,

            'gap' => 6,
        ]);

    expect($compiled['layout']['rows'])
        ->toHaveCount(2);

    expect($compiled['layout']['rows'][0]['columns'])
        ->toHaveCount(3);

    expect($compiled['layout']['rows'][1]['columns'])
        ->toHaveCount(1);

    /*
     * Widgets
     */
    expect(
        $compiled['layout']['rows'][0]['columns'][0]['widget']['key'],
    )->toBe('revenue');

    expect(
        $compiled['layout']['rows'][0]['columns'][1]['widget']['key'],
    )->toBe('orders');

    expect(
        $compiled['layout']['rows'][0]['columns'][2]['widget']['key'],
    )->toBe('customers');

    expect(
        $compiled['layout']['rows'][1]['columns'][0]['widget']['key'],
    )->toBe('sales');
});
