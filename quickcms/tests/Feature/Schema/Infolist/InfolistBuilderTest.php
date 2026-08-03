<?php

declare(strict_types=1);

use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Infolist\Entry\EntrySchema;
use App\Core\Schema\Infolist\InfolistSchema;
use Tests\Fixtures\Sources\UserSource;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an infolist schema', function (): void {
    $infolist = InfolistSchema::make()
        ->source(UserSource::class)
        ->schema([
            EntrySchema::make()
                ->label('Name')
                ->child(
                    TextSchema::make()
                        ->value('John Doe'),
                ),
        ]);

    expect(
        $infolist->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'infolist',

        'source' => UserSource::class,

        'schema' => [
            [
                'type' => 'entry',

                'label' => 'Name',

                'description' => '',

                'child' => [
                    'type' => 'text',

                    'value' => 'John Doe',

                    'color' => 'primary',

                    'props' => [],
                ],

                'props' => [],
            ],
        ],

        'props' => [],
    ]);
});
