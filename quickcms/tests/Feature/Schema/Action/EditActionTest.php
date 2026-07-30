<?php

declare(strict_types=1);

use App\Core\Schema\Action\Actions\EditAction;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enums\Color;

it('creates an edit action', function (): void {
    $action = EditAction::make();

    expect($action)
        ->toBeInstanceOf(EditAction::class);
});

it('configures the default id', function (): void {
    expect(EditAction::make()->id())
        ->toBe('edit');
});

it('configures the default name', function (): void {
    expect(EditAction::make()->name())
        ->toBe('edit');
});

it('configures the default label', function (): void {
    expect(EditAction::make()->label())
        ->toBe('Edit');
});

it('configures the default icon', function (): void {
    expect(EditAction::make()->icon())
        ->toBe('heroicon-o-pencil-square');
});

it('configures the default color', function (): void {
    expect(EditAction::make()->color())
        ->toBe(Color::Primary);
});

it('configures the default trigger', function (): void {
    expect(EditAction::make()->trigger())
        ->toBe(ActionTrigger::Modal);
});

it('allows overriding the defaults', function (): void {
    $action = EditAction::make()
        ->label('Modifier')
        ->icon('heroicon-o-pencil')
        ->color(Color::Success);

    expect($action->label())
        ->toBe('Modifier')
        ->and($action->icon())
        ->toBe('heroicon-o-pencil')
        ->and($action->color())
        ->toBe(Color::Success);
});
