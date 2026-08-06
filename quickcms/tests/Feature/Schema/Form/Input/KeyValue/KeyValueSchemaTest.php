<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\KeyValue\KeyValueSchema;
use App\Core\Support\Enum\KeyValue\ValueType;
use Tests\Support\Builders\KeyValueBuilderFactory;

it('creates a key value input', function (): void {
    expect(
        KeyValueBuilderFactory::make(),
    )->toBeInstanceOf(
        KeyValueSchema::class,
    );
});

it('sets key value properties', function (): void {
    $input = KeyValueBuilderFactory::make();

    expect($input->keyLabel())->toBe('Key');

    expect($input->valueLabel())->toBe('Value');

    expect($input->keyPlaceholder())->toBe('APP_NAME');

    expect($input->valuePlaceholder())->toBe('QuickCMS');

    expect($input->isEditableKeys())->toBeTrue();

    expect($input->isEditableValues())->toBeTrue();

    expect($input->isAddable())->toBeTrue();

    expect($input->isDeletable())->toBeTrue();

    expect($input->isReorderable())->toBeTrue();

    expect($input->valueType())->toBe(
        ValueType::Text,
    );
});
