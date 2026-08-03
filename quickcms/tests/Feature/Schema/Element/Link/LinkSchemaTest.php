<?php

declare(strict_types=1);

use App\Core\Schema\Element\Link\LinkSchema;
use App\Core\Support\Enums\Color;
use App\Core\Support\Enums\Icons\Heroicons;

it('creates a link schema', function (): void {
    expect(
        LinkSchema::make(),
    )->toBeInstanceOf(LinkSchema::class);
});

it('sets link properties', function (): void {
    $link = LinkSchema::make()
        ->label('OpenAI')
        ->url('https://openai.com')
        ->icon(Heroicons::Link)
        ->color(Color::Primary);

    expect($link->label())
        ->toBe('OpenAI');

    expect($link->url())
        ->toBe('https://openai.com');

    expect($link->icon())
        ->toBe(Heroicons::Link);

    expect($link->color())
        ->toBe(Color::Primary);
});

it('is immutable', function (): void {
    $link = LinkSchema::make();

    $updated = $link
        ->label('OpenAI')
        ->url('https://openai.com');

    expect($updated)
        ->not->toBe($link);

    expect($link->label())
        ->toBe('');

    expect($updated->label())
        ->toBe('OpenAI');

    expect($updated->url())
        ->toBe('https://openai.com');
});
