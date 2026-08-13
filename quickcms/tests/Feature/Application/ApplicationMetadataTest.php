<?php

declare(strict_types=1);

use App\Core\Application\ApplicationMetadata;
use App\Core\Application\Enums\ApplicationLayout;

it('creates application metadata', function (): void {
    expect(
        ApplicationMetadata::make(),
    )->toBeInstanceOf(ApplicationMetadata::class);
});

it('sets the id', function (): void {
    $metadata = ApplicationMetadata::make()
        ->id('admin');

    expect($metadata->id())
        ->toBe('admin');
});

it('sets the name', function (): void {
    $metadata = ApplicationMetadata::make()
        ->name('Administration');

    expect($metadata->name())
        ->toBe('Administration');
});

it('sets the path', function (): void {
    $metadata = ApplicationMetadata::make()
        ->path('/admin');

    expect($metadata->path())
        ->toBe('/admin');
});

it('sets the layout', function (): void {
    $metadata = ApplicationMetadata::make()
        ->layout(ApplicationLayout::Simple);

    expect($metadata->layout())
        ->toBe(ApplicationLayout::Simple);
});

it('converts metadata to an array', function (): void {
    $metadata = ApplicationMetadata::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin')
        ->layout(ApplicationLayout::Simple);

    expect($metadata->toArray())
        ->toBe([
            'id' => 'admin',
            'name' => 'Administration',
            'path' => '/admin',
            'layout' => ApplicationLayout::Simple->value,
        ]);
});
