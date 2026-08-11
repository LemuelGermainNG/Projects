<?php

declare(strict_types=1);

use App\Core\Bridge\Spatie\Tags\Source\TagSource;
use App\Core\Source\Source;
use App\Core\Source\SourceRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Tags\Tag;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $migration = include __DIR__ . '/../../../../vendor/spatie/laravel-tags/database/migrations/create_tag_tables.php.stub';
    $migration->up();
});

it('creates a tag source instance', function (): void {
    $source = TagSource::make();

    expect($source)->toBeInstanceOf(Source::class);
});

it('configures type and locale fluently', function (): void {
    $source = TagSource::make()
        ->type('category')
        ->locale('en');

    expect($source->type())->toBe('category');
    expect($source->locale())->toBe('en');
});

it('resolves spatie tag records', function (): void {
    Tag::findOrCreate('PHP', 'category');
    Tag::findOrCreate('Laravel', 'category');

    $source = TagSource::make()->type('category');
    $result = $source->resolve(new SourceRequest(page: 1, perPage: 10));

    expect($result->records)->toBeArray();
    expect($result->pagination['total'])->toBe(2);
});
