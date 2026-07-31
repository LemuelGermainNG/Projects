<?php

declare(strict_types=1);

use App\Core\Schema\Action\Actions\CancelAction;
use App\Core\Support\Enums\Color;
use App\Core\Support\Enums\Icons\Heroicons;

it('creates a cancel action', function (): void {
    $action = CancelAction::make();

    expect($action)
        ->toBeInstanceOf(CancelAction::class);
});

it('configures the default id', function (): void {
    $action = CancelAction::make();

    expect($action->id())
        ->toBe('cancel');
});

it('configures the default name', function (): void {
    $action = CancelAction::make();

    expect($action->name())
        ->toBe('cancel');
});

it('configures the default label', function (): void {
    $action = CancelAction::make();

    expect($action->label())
        ->toBe('Cancel');
});

it('configures the default icon', function (): void {
    $action = CancelAction::make();

    expect($action->icon())
        ->toBe(Heroicons::XMark);
});

it('configures the default color', function (): void {
    $action = CancelAction::make();

    expect($action->color())
        ->toBe(Color::Secondary);
});

it('allows overriding the defaults', function (): void {
    $action = CancelAction::make()
        ->label('Close')
        ->icon(Heroicons::XCircle)
        ->color(Color::Danger);

    expect($action->label())
        ->toBe('Close')
        ->and($action->icon())
        ->toBe(Heroicons::XCircle)
        ->and($action->color())
        ->toBe(Color::Danger);
});
