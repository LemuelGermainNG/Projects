<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\FileUpload\FileUploadSchema;
use Tests\Support\Builders\FileBuilderFactory;

it('creates a file upload', function (): void {
    expect(
        FileBuilderFactory::document(),
    )->toBeInstanceOf(
        FileUploadSchema::class,
    );
});

it('sets file upload properties', function (): void {
    $input = FileBuilderFactory::document();

    expect($input->collection())->toBe('documents');

    expect($input->acceptedFileTypes())->toBe([
        'application/pdf',
    ]);

    expect($input->disk())->toBe('public');

    expect($input->directory())->toBe('documents');

    expect($input->visibility())->toBe('private');

    expect($input->isMultiple())->toBeTrue();

    expect($input->maxFiles())->toBe(5);

    expect($input->maxSize())->toBe(10240);

    expect($input->minSize())->toBe(10);

    expect($input->isDownloadable())->toBeTrue();

    expect($input->isOpenable())->toBeTrue();

    expect($input->isPreviewable())->toBeTrue();

    expect($input->isPreserveFilenames())->toBeTrue();

    expect($input->isReorderable())->toBeTrue();
});
