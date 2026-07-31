<?php

declare(strict_types=1);

use App\Core\Schema\Action\Actions\CreateAction;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enums\Color;
use App\Core\Support\Enums\Icons\Heroicons;

it('creates a create action', function (): void {
    $action = CreateAction::make();

    expect($action)
        ->toBeInstanceOf(CreateAction::class);
});

it('configures the default id', function (): void {
    $action = CreateAction::make();

    expect($action->id())
        ->toBe('create');
});

it('configures the default name', function (): void {
    $action = CreateAction::make();

    expect($action->name())
        ->toBe('create');
});

it('configures the default label', function (): void {
    $action = CreateAction::make();

    expect($action->label())
        ->toBe('Create');
});

it('configures the default icon', function (): void {
    $action = CreateAction::make();

    expect($action->icon())
        ->toBe(Heroicons::Plus);
});

it('configures the default color', function (): void {
    $action = CreateAction::make();

    expect($action->color())
        ->toBe(Color::Primary);
});

it('configures the default trigger', function (): void {
    $action = CreateAction::make();

    expect($action->trigger())
        ->toBe(ActionTrigger::Modal);
});

it('allows overriding the defaults', function (): void {
    $action = CreateAction::make()
        ->label('New')
        ->icon(Heroicons::Plus)
        ->color(Color::Success);

    expect($action->label())
        ->toBe('New')
        ->and($action->icon())
        ->toBe(Heroicons::Plus)
        ->and($action->color())
        ->toBe(Color::Success);
});
