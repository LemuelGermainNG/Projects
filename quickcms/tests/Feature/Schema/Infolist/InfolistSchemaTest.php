<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Infolist\Entry\EntrySchema;
use App\Core\Schema\Infolist\InfolistSchema;
use Tests\Fixtures\Sources\UserSource;

it('creates an infolist schema', function (): void {
    expect(
        InfolistSchema::make(),
    )->toBeInstanceOf(InfolistSchema::class);
});

it('sets infolist properties', function (): void {
    $infolist = InfolistSchema::make()
        ->source(UserSource::class)
        ->schema([
            EntrySchema::make()
                ->label('Name')
                ->child(
                    TextSchema::make()
                        ->value('John Doe'),
                )
        ]);

    expect($infolist->source())
        ->toBe(UserSource::class);

    expect($infolist->schema())
        ->toHaveCount(1);
});

it('is immutable', function (): void {
    $infolist = InfolistSchema::make();

    $updated = $infolist
        ->source(UserSource::class);

    expect($updated)
        ->not->toBe($infolist);

    expect($infolist->source())
        ->toBeNull();

    expect($updated->source())
        ->toBe(UserSource::class);
});
