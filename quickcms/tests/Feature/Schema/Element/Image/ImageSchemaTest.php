<?php

declare(strict_types=1);

use App\Core\Schema\Element\Image\ImageSchema;

it('creates an image schema', function (): void {
    expect(
        ImageSchema::make(),
    )->toBeInstanceOf(ImageSchema::class);
});

it('sets image properties', function (): void {
    $image = ImageSchema::make()
        ->url('https://example.com/avatar.png')
        ->alt('Avatar')
        ->width(80)
        ->height(80);

    expect($image->url())
        ->toBe('https://example.com/avatar.png');

    expect($image->alt())
        ->toBe('Avatar');

    expect($image->width())
        ->toBe(80);

    expect($image->height())
        ->toBe(80);
});

it('is immutable', function (): void {
    $image = ImageSchema::make();

    $updated = $image
        ->url('https://example.com/avatar.png')
        ->width(80);

    expect($updated)
        ->not->toBe($image);

    expect($image->url())
        ->toBeNull();

    expect($updated->url())
        ->toBe('https://example.com/avatar.png');

    expect($updated->width())
        ->toBe(80);
});
