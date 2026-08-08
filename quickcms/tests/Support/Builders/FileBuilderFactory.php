<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Bridge\Spatie\MediaLibrary\Support\Enums\Conversion;
use App\Core\Schema\Form\Input\FileUpload\FileUploadSchema;
use App\Core\Schema\Form\Input\ImageUpload\ImageUploadSchema;

final class FileBuilderFactory
{
    public static function document(): FileUploadSchema
    {
        return FileUploadSchema::make()
            ->name('document')
            ->collection('documents')
            ->acceptedFileTypes([
                'application/pdf',
            ])
            ->disk('public')
            ->directory('documents')
            ->visibility('private')
            ->multiple()
            ->maxFiles(5)
            ->maxSize(10240)
            ->minSize(10)
            ->downloadable()
            ->openable()
            ->previewable()
            ->preserveFilenames()
            ->reorderable();
    }

    public static function avatar(): ImageUploadSchema
    {
        return ImageUploadSchema::make()
            ->name('avatar')
            ->collection('avatars')
            ->conversions([
                Conversion::Thumb,
                Conversion::Medium,
            ])
            ->crop()
            ->circleCrop()
            ->avatar()
            ->aspectRatio('1:1')
            ->resize([
                'width' => 512,
                'height' => 512,
            ])
            ->imageQuality(90)
            ->responsiveImages()
            ->optimize()
            ->previewable();
    }
}
