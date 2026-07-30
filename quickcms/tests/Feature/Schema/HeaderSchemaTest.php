<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Support\Enums\Icons\Heroicons;

it('creates a header schema', function (): void {
    expect(
        HeaderSchema::make(),
    )->toBeInstanceOf(HeaderSchema::class);
});

it('sets header properties', function (): void {
    $header = HeaderSchema::make()
        ->title('Users')
        ->description('Manage application users.')
        ->icon(Heroicons::Users)
        ->props([
            'foo' => 'bar',
        ]);

    expect($header->title())->toBe('Users')
        ->and($header->description())->toBe('Manage application users.')
        ->and($header->icon())->toBe(Heroicons::Users)
        ->and($header->props())->toBe([
            'foo' => 'bar',
        ]);
});

it('is immutable', function (): void {
    $header = HeaderSchema::make();

    $updated = $header->title('Users');

    expect($updated)
        ->not->toBe($header);

    expect($header->title())
        ->toBe('');
});
