<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\ImageUpload;

use App\Core\Bridge\Spatie\MediaLibrary\Traits\InteractsWithMediaLibrary;
use App\Core\Schema\Form\Base\FileInputBaseSchema;
use App\Core\Support\Concerns\Image\HasAspectRatio;
use App\Core\Support\Concerns\Image\HasAvatar;
use App\Core\Support\Concerns\Image\HasCircleCrop;
use App\Core\Support\Concerns\Image\HasCrop;
use App\Core\Support\Concerns\Image\HasImageQuality;
use App\Core\Support\Concerns\Image\HasResize;

final class ImageUploadSchema extends FileInputBaseSchema
{
    use InteractsWithMediaLibrary;

    use HasAspectRatio;
    use HasAvatar;
    use HasCircleCrop;
    use HasCrop;
    use HasImageQuality;
    use HasResize;
}
