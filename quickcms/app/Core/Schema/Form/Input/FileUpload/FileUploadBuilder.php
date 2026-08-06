<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\FileUpload;

use App\Core\Schema\Form\Base\FileInputBaseBuilder;

final class FileUploadBuilder extends FileInputBaseBuilder
{
    public static function schema(): string
    {
        return FileUploadSchema::class;
    }
}
