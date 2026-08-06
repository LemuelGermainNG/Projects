<?php

declare(strict_types=1);

use App\Core\Bridge\Spatie\MediaLibrary\Support\Enums\Conversion;
use App\Core\Schema\Form\Input\ImageUpload\ImageUploadSchema;
use Tests\Support\Builders\FileBuilderFactory;

it('creates an image upload', function (): void {
    expect(
        FileBuilderFactory::avatar(),
    )->toBeInstanceOf(
        ImageUploadSchema::class,
    );
});

it('sets image upload properties', function (): void {
    $input = FileBuilderFactory::avatar();

    expect($input->collection())->toBe('avatars');

    expect($input->conversions())->toBe([
        Conversion::Thumb,
        Conversion::Medium,
    ]);

    expect($input->isCrop())->toBeTrue();

    expect($input->isCircleCrop())->toBeTrue();

    expect($input->isAvatar())->toBeTrue();

    expect($input->aspectRatio())->toBe('1:1');

    expect($input->resize())->toBe([
        'width' => 512,
        'height' => 512,
    ]);

    expect($input->imageQuality())->toBe(90);

    expect($input->isResponsiveImages())->toBeTrue();

    expect($input->isOptimize())->toBeTrue();

    expect($input->isPreviewable())->toBeTrue();
});
