<?php

declare(strict_types=1);

use App\Core\Schema\Action\Actions\ViewAction;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enums\Color;
use App\Core\Support\Enums\Icons\Heroicons;

it('creates a view action', function (): void {
    $action = ViewAction::make();

    expect($action)
        ->toBeInstanceOf(ViewAction::class);
});

it('configures the default id', function (): void {
    $action = ViewAction::make();

    expect($action->id())
        ->toBe('view');
});

it('configures the default name', function (): void {
    $action = ViewAction::make();

    expect($action->name())
        ->toBe('view');
});

it('configures the default label', function (): void {
    $action = ViewAction::make();

    expect($action->label())
        ->toBe('View');
});

it('configures the default icon', function (): void {
    $action = ViewAction::make();

    expect($action->icon())
        ->toBe(Heroicons::Eye);
});

it('inherits the default color', function (): void {
    $action = ViewAction::make();

    expect($action->color())
        ->toBe(Color::Primary);
});

it('configures the default trigger', function (): void {
    $action = ViewAction::make();

    expect($action->trigger())
        ->toBe(ActionTrigger::Modal);
});

it('allows overriding the defaults', function (): void {
    $action = ViewAction::make()
        ->label('Details')
        ->icon(Heroicons::Eye)
        ->color(Color::Info);

    expect($action->label())
        ->toBe('Details')
        ->and($action->icon())
        ->toBe(Heroicons::Eye)
        ->and($action->color())
        ->toBe(Color::Info);
});
