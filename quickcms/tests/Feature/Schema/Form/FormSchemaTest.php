<?php

declare(strict_types=1);

use App\Core\Schema\Action\ActionSchema;
use App\Core\Schema\Form\Field\FieldSchema;
use App\Core\Schema\Form\FormSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates a form schema', function (): void {
    expect(
        FormSchema::make(),
    )->toBeInstanceOf(FormSchema::class);
});

it('sets form properties', function (): void {
    $form = FormSchema::make()
        ->source(UserSource::class)
        ->schema([
            FieldSchema::make(),
        ]);

    expect($form->source())
        ->toBe(UserSource::class);

    expect($form->schema())
        ->toHaveCount(1);
});

it('is immutable', function (): void {
    $form = FormSchema::make();

    $updated = $form
        ->source(UserSource::class);

    expect($updated)
        ->not->toBe($form);

    expect($form->source())
        ->toBeNull();

    expect($updated->source())
        ->toBe(UserSource::class);
});


it('sets form actions', function (): void {
    $form = FormSchema::make()
        ->headerActions([
            ActionSchema::make()
                ->label('Cancel'),
        ])
        ->footerActions([
            ActionSchema::make()
                ->label('Save'),
        ]);

    expect($form->headerActions())
        ->toHaveCount(1);

    expect($form->footerActions())
        ->toHaveCount(1);
});
