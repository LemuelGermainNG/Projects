<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Tags\TagsSchema;
use Tests\Support\Assertions\OptionAssertions;
use Tests\Support\Builders\OptionBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a tags input', function (): void {
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

    expect(
        $tags->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'tags',

        'tagType' => 'categories',

        'locale' => 'fr',

        'separator' => ',',

        'maxTags' => 10,

        'suggestions' => true,

        'createOnBlur' => true,

        'options' => [
            OptionAssertions::administrator(),
            OptionAssertions::user(),
        ],
    ]);
});
