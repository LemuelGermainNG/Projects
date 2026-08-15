<?php

declare(strict_types=1);

use App\Core\Schema\Action\ActionSchema;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Schema\Action\Enums\ActionType;
use App\Core\Support\Enum\Color;
use App\Core\Support\Enum\Size;
use App\Core\Support\Enum\Target;

it('creates an action schema', function (): void {
    $action = ActionSchema::make();

    expect($action)
        ->toBeInstanceOf(ActionSchema::class);
});

it('sets the id', function (): void {
    $action = ActionSchema::make()
        ->id('edit');

    expect($action->id())
        ->toBe('edit');
});

it('sets the name', function (): void {
    $action = ActionSchema::make()
        ->name('edit');

    expect($action->name())
        ->toBe('edit');
});

it('sets the label', function (): void {
    $action = ActionSchema::make()
        ->label('Edit');

    expect($action->label())
        ->toBe('Edit');
});

it('sets the icon', function (): void {
    $action = ActionSchema::make()
        ->icon('heroicon-o-pencil');

    expect($action->icon())
        ->toBe('heroicon-o-pencil');
});

it('sets the tooltip', function (): void {
    $action = ActionSchema::make()
        ->tooltip('Edit this record');

    expect($action->tooltip())
        ->toBe('Edit this record');
});

it('sets the url', function (): void {
    $action = ActionSchema::make()
        ->url('/users/1/edit');

    expect($action->url())
        ->toBe('/users/1/edit');
});

it('stores custom attributes', function (): void {
    $action = ActionSchema::make()
        ->attribute('data-test', 'edit-action')
        ->attribute('class', 'btn-primary');

    expect($action->attributes())
        ->toBe([
            'data-test' => 'edit-action',
            'class' => 'btn-primary',
        ]);
});

it('sets the color', function (): void {
    $action = ActionSchema::make()
        ->color(Color::Primary);

    expect($action->color())
        ->toBe(Color::Primary);
});

it('sets the size', function (): void {
    $action = ActionSchema::make()
        ->size(Size::Medium);

    expect($action->size())
        ->toBe(Size::Medium);
});

it('sets the target', function (): void {
    $action = ActionSchema::make()
        ->target(Target::Blank);

    expect($action->target())
        ->toBe(Target::Blank);
});

it('sets the trigger', function (): void {
    $action = ActionSchema::make()
        ->trigger(ActionTrigger::Modal);

    expect($action->trigger())
        ->toBe(ActionTrigger::Modal);
});

it('sets the type', function (): void {
    $action = ActionSchema::make()
        ->type(ActionType::Link);

    expect($action->type())
        ->toBe(ActionType::Link);
});

it('sets the visibility', function (): void {
    $action = ActionSchema::make()
        ->visible(false);

    expect($action->isVisible())
        ->toBeFalse();
});

it('sets the disabled state', function (): void {
    $action = ActionSchema::make()
        ->disabled(true);

    expect($action->isDisabled())
        ->toBeTrue();
});
