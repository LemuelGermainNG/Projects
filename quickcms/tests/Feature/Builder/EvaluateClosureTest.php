<?php

declare(strict_types=1);

use App\Core\Support\Contexts\EvaluationContext;
use App\Core\Schema\Element\Text\TextSchema;
use Tests\Fixtures\Sources\UserData;
use Tests\Support\Factories\BuilderRegistryFactory;

it('evaluates closures using the evaluation context', function (): void {

    $record = new UserData(
        name: 'John Doe',
        email: 'john@example.com',
    );


    $text = TextSchema::make()
        ->value(
            fn (EvaluationContext $context): string => $context->record()->name,
        );

    expect(
        $text->compile(
            BuilderRegistryFactory::make(),
            new EvaluationContext(
                record: $record,
            ),
        ),
    )->toBe([
        'type' => 'text',

        'value' => 'John Doe',

        'color' => 'primary',

        'props' => [],
    ]);
});
