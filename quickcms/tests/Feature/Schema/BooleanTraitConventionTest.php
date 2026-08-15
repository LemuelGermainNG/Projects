<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Password\PasswordInputSchema;
use App\Core\Schema\Form\Input\Select\SelectSchema;
use App\Core\Schema\Form\Input\Textarea\TextareaInputSchema;
use App\Core\Schema\Table\Column\ColumnSchema;

it('boolean fluent methods enable the option without an argument', function (): void {
    $password = PasswordInputSchema::make()
        ->revealable();

    $select = SelectSchema::make()
        ->multiple()
        ->searchable();

    $textarea = TextareaInputSchema::make()
        ->autosize();

    $column = ColumnSchema::make()
        ->hidden()
        ->sortable()
        ->searchable()
        ->toggleable();

    expect($password->isRevealable())->toBeTrue();
    expect($select->isMultiple())->toBeTrue();
    expect($select->isSearchable())->toBeTrue();
    expect($textarea->isAutosize())->toBeTrue();
    expect($column->isHidden())->toBeTrue();
    expect($column->isSortable())->toBeTrue();
    expect($column->isSearchable())->toBeTrue();
    expect($column->isToggleable())->toBeTrue();

    $dynamicColumn = ColumnSchema::make()
        ->sortable(fn (): bool => true)
        ->searchable(fn (): bool => true)
        ->toggleable(fn (): bool => true);

    expect($dynamicColumn->isSortable())->toBeInstanceOf(Closure::class);
    expect($dynamicColumn->isSearchable())->toBeInstanceOf(Closure::class);
    expect($dynamicColumn->isToggleable())->toBeInstanceOf(Closure::class);
});

it('boolean fluent methods can explicitly disable an option', function (): void {
    $input = PasswordInputSchema::make()
        ->revealable(false)
        ->disabled(false)
        ->readonly(false);

    expect($input->isRevealable())->toBeFalse();
    expect($input->isDisabled())->toBeFalse();
    expect($input->isReadonly())->toBeFalse();
});
