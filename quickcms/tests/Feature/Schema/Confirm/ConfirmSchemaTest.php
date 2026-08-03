<?php

declare(strict_types=1);

use App\Core\Schema\Confirm\ConfirmSchema;
use App\Core\Support\Enums\Color;
use Tests\Support\Factories\BuilderRegistryFactory;

it('creates a confirmation schema', function (): void {
    expect(
        ConfirmSchema::make(),
    )->toBeInstanceOf(ConfirmSchema::class);
});

it('compiles a confirmation schema', function (): void {
    $confirm = ConfirmSchema::make()
        ->title('Delete user')
        ->description('This action cannot be undone.')
        ->confirmLabel('Delete')
        ->cancelLabel('Cancel')
        ->icon('heroicon-o-trash')
        ->color(Color::Danger)
        ->props([
            'persistent' => true,
        ]);

    expect(
        $confirm->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'confirm',
        'title' => 'Delete user',
        'description' => 'This action cannot be undone.',
        'confirmLabel' => 'Delete',
        'cancelLabel' => 'Cancel',
        'icon' => 'heroicon-o-trash',
        'color' => 'danger',
        'props' => [
            'persistent' => true,
        ],
    ]);
});

it('is immutable', function (): void {
    $confirm = ConfirmSchema::make();

    $updated = $confirm->title('Delete user');

    expect($updated)
        ->not->toBe($confirm);
});
