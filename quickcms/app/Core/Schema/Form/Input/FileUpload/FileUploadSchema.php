<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\FileUpload;

use App\Core\Bridge\Spatie\MediaLibrary\Traits\InteractsWithMediaLibrary;
use App\Core\Schema\Form\Base\FileInputBaseSchema;

final class FileUploadSchema extends FileInputBaseSchema
{
    use InteractsWithMediaLibrary;
}
