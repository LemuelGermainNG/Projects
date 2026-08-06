<?php

declare(strict_types=1);

use App\Core\Schema\Action\ActionSchema;
use App\Core\Schema\Confirm\ConfirmSchema;
use App\Core\Schema\Modal\ModalSchema;
use App\Core\Support\Enum\Color;
use App\Core\Support\Enum\Position;
use App\Core\Support\Enum\Size;
use Tests\Support\Factories\BuilderRegistryFactory;

it('creates an action schema', function (): void {
    expect(
        ActionSchema::make(),
    )->toBeInstanceOf(ActionSchema::class);
});

it('compiles an action schema', function (): void {
    $action = ActionSchema::make()
        ->label('Edit')
        ->icon('heroicon-o-pencil')
        ->color(Color::Primary);

    expect(
        $action->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'action',
        'label' => 'Edit',
        'icon' => 'heroicon-o-pencil',
        'color' => 'primary',
        'modal' => null,
        'confirmation' => null,
    ]);
});

it('compiles an action with a modal and confirmation', function (): void {
    $action = ActionSchema::make()
        ->label('Delete')
        ->icon('heroicon-o-trash')
        ->color(Color::Danger)
        ->modal(
            ModalSchema::make()
                ->title('Delete user')
                ->content('Are you sure?'),
        )
        ->confirmation(
            ConfirmSchema::make()
                ->title('Confirmation')
                ->description('This action cannot be undone.')
                ->confirmLabel('Delete')
                ->cancelLabel('Cancel'),
        );

    expect(
        $action->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'action',
        'label' => 'Delete',
        'icon' => 'heroicon-o-trash',
        'color' => 'danger',

        'modal' => [
            'type' => 'modal',
            'title' => 'Delete user',
            'description' => null,
            'size' => Size::Medium,
            'position' => Position::Center,
            'closable' => true,
            'closeOnEscape' => true,
            'closeOnBackdrop' => true,
            'stickyHeader' => false,
            'stickyFooter' => false,
            'content' => 'Are you sure?',
            'props' => [],
        ],

        'confirmation' => [
            'type' => 'confirm',
            'title' => 'Confirmation',
            'description' => 'This action cannot be undone.',
            'confirmLabel' => 'Delete',
            'cancelLabel' => 'Cancel',
            'icon' => null,
            'color' => 'primary',
            'props' => [],
        ],
    ]);
});

it('is immutable', function (): void {
    $action = ActionSchema::make();

    $updated = $action->label('Save');

    expect($updated)
        ->not->toBe($action);
});
