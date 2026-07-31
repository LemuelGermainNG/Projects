<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;


it('creates a header schema', function (): void {
    expect(
        HeaderSchema::make(),
    )->toBeInstanceOf(HeaderSchema::class);
});

it('sets header properties', function (): void {
    $header = HeaderSchema::make()
        ->title('Dashboard')
        ->description('Welcome to the dashboard.');

    expect($header->title())
        ->toBe('Dashboard')
        ->and($header->description())
        ->toBe('Welcome to the dashboard.');
});

it('is immutable', function (): void {
    $header = HeaderSchema::make();

    $updated = $header->title('Dashboard');

    expect($updated)
        ->not->toBe($header);

    expect($header->title())
        ->toBeNull();

    expect($updated->title())
        ->toBe('Dashboard');
});
