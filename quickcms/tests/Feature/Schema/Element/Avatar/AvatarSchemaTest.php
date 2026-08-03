<?php

declare(strict_types=1);

use App\Core\Schema\Element\Avatar\AvatarSchema;

it('creates an avatar schema', function (): void {
    expect(
        AvatarSchema::make(),
    )->toBeInstanceOf(AvatarSchema::class);
});

it('sets avatar properties', function (): void {
    $avatar = AvatarSchema::make()
        ->name('John Doe')
        ->url('https://example.com/avatar.png')
        ->alt('John Doe');

    expect($avatar->name())
        ->toBe('John Doe');

    expect($avatar->url())
        ->toBe('https://example.com/avatar.png');

    expect($avatar->alt())
        ->toBe('John Doe');
});

it('is immutable', function (): void {
    $avatar = AvatarSchema::make();

    $updated = $avatar
        ->name('John Doe')
        ->url('https://example.com/avatar.png');

    expect($updated)
        ->not->toBe($avatar);

    expect($avatar->name())
        ->toBe('');

    expect($avatar->url())
        ->toBeNull();

    expect($updated->name())
        ->toBe('John Doe');

    expect($updated->url())
        ->toBe('https://example.com/avatar.png');
});
