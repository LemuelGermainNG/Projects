<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Section\SectionSchema;

it('creates a section schema', function (): void {
    expect(
        SectionSchema::make(),
    )->toBeInstanceOf(SectionSchema::class);
});

it('sets section properties', function (): void {
    $section = SectionSchema::make()
        ->header(
            HeaderSchema::make()
                ->title('Users')
                ->description('Manage users'),
        );

    expect($section->header())
        ->toBeInstanceOf(HeaderSchema::class);
});

it('is immutable', function (): void {
    $section = SectionSchema::make();

    $updated = $section->header(
        HeaderSchema::make()
            ->title('Users'),
    );

    expect($updated)
        ->not->toBe($section);

    expect($section->header())
        ->toBeNull();

    expect($updated->header())
        ->toBeInstanceOf(HeaderSchema::class);
});
