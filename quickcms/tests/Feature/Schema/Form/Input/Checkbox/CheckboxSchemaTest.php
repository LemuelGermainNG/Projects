<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Checkbox\CheckboxSchema;

it('creates a checkbox', function (): void {
    expect(
        CheckboxSchema::make(),
    )->toBeInstanceOf(
        CheckboxSchema::class,
    );
});

it('sets properties', function (): void {
    $checkbox = CheckboxSchema::make()
        ->checked()
        ->inline();

    expect(
        $checkbox->isChecked(),
    )->toBeTrue();

    expect(
        $checkbox->isInline(),
    )->toBeTrue();
});
