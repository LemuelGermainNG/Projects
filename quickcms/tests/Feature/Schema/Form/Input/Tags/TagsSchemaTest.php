<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Tags\TagsSchema;
use Tests\Support\Builders\OptionBuilderFactory;

it('sets tags properties', function (): void {
    $tags = TagsSchema::make()
        ->tagType('categories')
        ->locale('fr')
        ->separator(',')
        ->maxTags(10)
        ->suggestions()
        ->createOnBlur()
        ->options([
            OptionBuilderFactory::administrator(),
            OptionBuilderFactory::user(),
        ]);

    expect($tags->tagType())->toBe('categories');
    expect($tags->locale())->toBe('fr');
    expect($tags->separator())->toBe(',');
    expect($tags->maxTags())->toBe(10);
    expect($tags->isSuggestions())->toBeTrue();
    expect($tags->isCreateOnBlur())->toBeTrue();
    expect($tags->options())->toHaveCount(2);
});
