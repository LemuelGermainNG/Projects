<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class FileAssertions
{
    public static function document(): array
    {
        return [
            'type' => 'file-upload',

            'collection' => 'documents',

            'acceptedFileTypes' => [
                'application/pdf',
            ],

            'disk' => 'public',

            'directory' => 'documents',

            'visibility' => 'private',

            'multiple' => true,

            'maxFiles' => 5,

            'maxSize' => 10240,

            'minSize' => 10,

            'downloadable' => true,

            'openable' => true,

            'previewable' => true,

            'preserveFilenames' => true,

            'reorderable' => true,
        ];
    }

    public static function avatar(): array
    {
        return [
            'type' => 'image-upload',

            'collection' => 'avatars',

            'conversions' => [
                'thumb',
                'medium',
            ],

            'crop' => true,

            'circleCrop' => true,

            'avatar' => true,

            'aspectRatio' => '1:1',

            'resize' => [
                'width' => 512,
                'height' => 512,
            ],

            'imageQuality' => 90,

            'responsiveImages' => true,

            'optimize' => true,

            'previewable' => true,
        ];
    }
}
