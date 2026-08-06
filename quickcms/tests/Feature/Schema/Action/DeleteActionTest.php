<?php

declare(strict_types=1);

use App\Core\Schema\Action\Actions\DeleteAction;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enum\Color;
use App\Core\Support\Enum\Icons\Heroicons;

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
        ->toBe(Heroicons::Trash);
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
        ->icon(Heroicons::XMark)
        ->color(Color::Warning);

    expect($action->label())
        ->toBe('Remove')
        ->and($action->icon())
        ->toBe(Heroicons::XMark)
        ->and($action->color())
        ->toBe(Color::Warning);
});
