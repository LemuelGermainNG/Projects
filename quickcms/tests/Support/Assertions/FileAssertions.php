<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class FileAssertions
{
    public static function document(): array
    {
        return [
            'type' => 'file-upload',
            'name' => 'document',
            'value' => null,
            'placeholder' => '',
            'disabled' => false,
            'readonly' => false,
            'acceptedFileTypes' => [
                'application/pdf',
            ],
            'disk' => 'public',
            'directory' => 'documents',
            'visibility' => 'private',
            'maxFiles' => 5,
            'maxSize' => 10240,
            'minSize' => 10,
            'multiple' => true,
            'downloadable' => true,
            'openable' => true,
            'previewable' => true,
            'preserveFilenames' => true,
            'reorderable' => true,
            'collection' => 'documents',
            'props' => [],
        ];
    }

    public static function avatar(): array
    {
        return [
            'type' => 'image-upload',
            'name' => 'avatar',
            'value' => null,
            'placeholder' => '',
            'disabled' => false,
            'readonly' => false,
            'previewable' => true,
            'collection' => 'avatars',
            'conversions' => [
                'thumb',
                'medium',
            ],
            'responsiveImages' => true,
            'optimize' => true,
            'crop' => true,
            'circleCrop' => true,
            'avatar' => true,
            'aspectRatio' => '1:1',
            'resize' => [
                'width' => 512,
                'height' => 512,
            ],
            'imageQuality' => 90,
            'props' => [],
        ];
    }
}
