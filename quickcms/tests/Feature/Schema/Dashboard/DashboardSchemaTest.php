<?php

declare(strict_types=1);

use App\Core\Schema\Action\ActionSchema;
use App\Core\Schema\Dashboard\DashboardSchema;
use App\Core\Schema\Element\Filter\FilterSchema;
use App\Core\Schema\Form\State\StateSchema;

it('sets dashboard state', function (): void {
    $state = StateSchema::make()
        ->path('dashboard')
        ->default([
            'period' => 'month',
        ])
        ->reactive();

    $dashboard = DashboardSchema::make()
        ->state($state);

    expect($dashboard->stateSchema())
        ->toBe($state);

    expect($dashboard->hasState())
        ->toBeTrue();
});

it('sets dashboard filters', function (): void {
    $filters = [
        FilterSchema::make()
            ->name('period')
            ->label('Period'),

        FilterSchema::make()
            ->name('country')
            ->label('Country'),
    ];

    $dashboard = DashboardSchema::make()
        ->filters($filters);

    expect($dashboard->filterSchemas())
        ->toHaveCount(2);

    expect($dashboard->filterSchemas())
        ->toBe($filters);

    expect($dashboard->hasFilters())
        ->toBeTrue();
});

it('sets dashboard actions', function (): void {
    $actions = [
        ActionSchema::make()
            ->label('Refresh'),

        ActionSchema::make()
            ->label('Export'),
    ];

    $dashboard = DashboardSchema::make()
        ->actions($actions);

    expect($dashboard->actionSchemas())
        ->toHaveCount(2);

    expect($dashboard->actionSchemas())
        ->toBe($actions);

    expect($dashboard->hasActions())
        ->toBeTrue();
});

it('sets dashboard refresh configuration', function (): void {
    $dashboard = DashboardSchema::make()
        ->refresh([
            'enabled' => true,
            'interval' => 30,
        ]);

    expect($dashboard->refreshValue())
        ->toBe([
            'enabled' => true,
            'interval' => 30,
        ]);

    expect($dashboard->hasRefresh())
        ->toBeTrue();
});

it('sets a simple dashboard refresh configuration', function (): void {
    $dashboard = DashboardSchema::make()
        ->refresh(true);

    expect($dashboard->refreshValue())
        ->toBeTrue();

    expect($dashboard->hasRefresh())
        ->toBeTrue();
});

it('is immutable when setting dashboard context', function (): void {
    $dashboard = DashboardSchema::make();

    $state = StateSchema::make()
        ->path('dashboard');

    $filters = [
        FilterSchema::make()
            ->name('period'),
    ];

    $actions = [
        ActionSchema::make()
            ->label('Refresh'),
    ];

    $updated = $dashboard
        ->state($state)
        ->filters($filters)
        ->actions($actions)
        ->refresh([
            'enabled' => true,
            'interval' => 30,
        ]);

    expect($updated)
        ->not->toBe($dashboard);

    expect($dashboard->stateSchema())
        ->toBeNull();

    expect($dashboard->hasState())
        ->toBeFalse();

    expect($dashboard->filterSchemas())
        ->toBe([]);

    expect($dashboard->hasFilters())
        ->toBeFalse();

    expect($dashboard->actionSchemas())
        ->toBe([]);

    expect($dashboard->hasActions())
        ->toBeFalse();

    expect($dashboard->refreshValue())
        ->toBeNull();

    expect($dashboard->hasRefresh())
        ->toBeFalse();

    expect($updated->stateSchema())
        ->toBe($state);

    expect($updated->filterSchemas())
        ->toBe($filters);

    expect($updated->actionSchemas())
        ->toBe($actions);

    expect($updated->refreshValue())
        ->toBe([
            'enabled' => true,
            'interval' => 30,
        ]);
});
