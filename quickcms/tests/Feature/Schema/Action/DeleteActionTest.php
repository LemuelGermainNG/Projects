<?php

declare(strict_types=1);

use App\Core\Schema\Action\Actions\DeleteAction;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enums\Color;

it('creates a delete action', function (): void {
    $action = DeleteAction::make();

    expect($action)
        ->toBeInstanceOf(DeleteAction::class);
});

it('configures the default id', function (): void {
    $action = DeleteAction::make();

    expect($action->id())
        ->toBe('delete');
});

it('configures the default name', function (): void {
    $action = DeleteAction::make();

    expect($action->name())
        ->toBe('delete');
});

it('configures the default label', function (): void {
    $action = DeleteAction::make();

    expect($action->label())
        ->toBe('Delete');
});

it('configures the default icon', function (): void {
    $action = DeleteAction::make();

    expect($action->icon())
        ->toBe('heroicon-o-trash');
});

it('configures the default color', function (): void {
    $action = DeleteAction::make();

    expect($action->color())
        ->toBe(Color::Danger);
});

it('configures the default trigger', function (): void {
    $action = DeleteAction::make();

    expect($action->trigger())
        ->toBe(ActionTrigger::Request);
});

it('allows overriding the defaults', function (): void {
    $action = DeleteAction::make()
        ->label('Remove')
        ->icon('heroicon-o-x-mark')
        ->color(Color::Warning);

    expect($action->label())
        ->toBe('Remove')
        ->and($action->icon())
        ->toBe('heroicon-o-x-mark')
        ->and($action->color())
        ->toBe(Color::Warning);
});
