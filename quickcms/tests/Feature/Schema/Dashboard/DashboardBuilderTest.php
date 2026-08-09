<?php

declare(strict_types=1);

use App\Core\Schema\Action\ActionSchema;
use App\Core\Schema\Dashboard\DashboardSchema;
use App\Core\Schema\Element\Filter\FilterSchema;
use App\Core\Schema\Form\State\StateSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles dashboard state', function (): void {
    $dashboard = DashboardSchema::make()
        ->state(
            StateSchema::make()
                ->path('dashboard')
                ->default([
                    'period' => 'month',
                ])
                ->reactive(),
        );

    $compiled = $dashboard->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['state'])
        ->toMatchArray([
            'path' => 'dashboard',

            'default' => [
                'period' => 'month',
            ],

            'reactive' => true,
        ]);
});

it('compiles dashboard filters', function (): void {
    $dashboard = DashboardSchema::make()
        ->filters([
            FilterSchema::make()
                ->name('period')
                ->label('Period'),

            FilterSchema::make()
                ->name('country')
                ->label('Country'),
        ]);

    $compiled = $dashboard->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['filters'])
        ->toHaveCount(2);

    expect($compiled['filters'][0])
        ->toMatchArray([
            'name' => 'period',
            'label' => 'Period',
        ]);

    expect($compiled['filters'][1])
        ->toMatchArray([
            'name' => 'country',
            'label' => 'Country',
        ]);
});

it('compiles dashboard actions', function (): void {
    $dashboard = DashboardSchema::make()
        ->actions([
            ActionSchema::make()
                ->label('Refresh'),

            ActionSchema::make()
                ->label('Export'),
        ]);

    $compiled = $dashboard->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['actions'])
        ->toHaveCount(2);

    expect($compiled['actions'][0])
        ->toMatchArray([
            'label' => 'Refresh',
        ]);

    expect($compiled['actions'][1])
        ->toMatchArray([
            'label' => 'Export',
        ]);
});

it('compiles dashboard refresh configuration', function (): void {
    $dashboard = DashboardSchema::make()
        ->refresh([
            'enabled' => true,
            'interval' => 30,
        ]);

    $compiled = $dashboard->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled['refresh'])
        ->toBe([
            'enabled' => true,
            'interval' => 30,
        ]);
});

it('compiles a complete dashboard context', function (): void {
    $dashboard = DashboardSchema::make()
        ->title('Sales Dashboard')
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
        ]);

    $compiled = $dashboard->compile(
        BuilderRegistryFactory::make(),
    );

    expect($compiled)
        ->toMatchArray([
            'type' => 'dashboard',

            'title' => 'Sales Dashboard',

            'refresh' => [
                'enabled' => true,
                'interval' => 30,
            ],
        ]);

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
});
