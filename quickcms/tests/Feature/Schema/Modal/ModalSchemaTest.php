<?php

declare(strict_types=1);

use App\Core\Schema\Modal\ModalSchema;
use App\Core\Support\Enums\Position;
use App\Core\Support\Enums\Size;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a modal schema', function (): void {
    $modal = ModalSchema::make()
        ->title('Delete user')
        ->description('This action cannot be undone.')
        ->size(Size::Large)
        ->position(Position::Right)
        ->stickyHeader()
        ->stickyFooter()
        ->content('Hello World')
        ->props([
            'persistent' => true,
        ]);

    expect(
        $modal->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'modal',
        'title' => 'Delete user',
        'description' => 'This action cannot be undone.',
        'size' => Size::Large,
        'position' => Position::Right,
        'closable' => true,
        'closeOnEscape' => true,
        'closeOnBackdrop' => true,
        'stickyHeader' => true,
        'stickyFooter' => true,
        'content' => 'Hello World',
        'props' => [
            'persistent' => true,
        ],
    ]);
});

it('is immutable', function (): void {
    $modal = ModalSchema::make();

    $updated = $modal->title('My modal');

    expect($updated)
        ->not->toBe($modal);

    expect($modal->title())
        ->toBe('');

    expect($updated->title())
        ->toBe('My modal');
});
