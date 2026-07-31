<?php

declare(strict_types=1);

use App\Core\Schema\Action\Actions\SaveAction;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enums\Color;
use App\Core\Support\Enums\Icons\Heroicons;

it('creates a save action', function (): void {
    $action = SaveAction::make();

    expect($action)
        ->toBeInstanceOf(SaveAction::class);
});

it('configures the default id', function (): void {
    $action = SaveAction::make();

    expect($action->id())
        ->toBe('save');
});

it('configures the default name', function (): void {
    $action = SaveAction::make();

    expect($action->name())
        ->toBe('save');
});

it('configures the default label', function (): void {
    $action = SaveAction::make();

    expect($action->label())
        ->toBe('Save');
});

it('configures the default icon', function (): void {
    $action = SaveAction::make();

    expect($action->icon())
        ->toBe(Heroicons::Check);
});

it('configures the default color', function (): void {
    $action = SaveAction::make();

    expect($action->color())
        ->toBe(Color::Success);
});

it('configures the default trigger', function (): void {
    $action = SaveAction::make();

    expect($action->trigger())
        ->toBe(ActionTrigger::Request);
});

it('allows overriding the defaults', function (): void {
    $action = SaveAction::make()
        ->label('Store')
        ->icon(Heroicons::CheckBadge)
        ->color(Color::Primary);

    expect($action->label())
        ->toBe('Store')
        ->and($action->icon())
        ->toBe(Heroicons::CheckBadge)
        ->and($action->color())
        ->toBe(Color::Primary);
});
