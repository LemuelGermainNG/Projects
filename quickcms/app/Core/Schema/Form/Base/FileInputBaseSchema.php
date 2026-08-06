<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Schema\Form\Base\BaseInputSchema;
use App\Core\Support\Concerns\File\HasAcceptedFileTypes;
use App\Core\Support\Concerns\File\HasCollection;
use App\Core\Support\Concerns\File\HasConversions;
use App\Core\Support\Concerns\File\HasDirectory;
use App\Core\Support\Concerns\File\HasDisk;
use App\Core\Support\Concerns\File\HasDownloadable;
use App\Core\Support\Concerns\File\HasImageEditor;
use App\Core\Support\Concerns\File\HasMaxFiles;
use App\Core\Support\Concerns\File\HasMaxSize;
use App\Core\Support\Concerns\File\HasMinSize;
use App\Core\Support\Concerns\File\HasMultiple;
use App\Core\Support\Concerns\File\HasOpenable;
use App\Core\Support\Concerns\File\HasOptimize;
use App\Core\Support\Concerns\File\HasPreserveFilenames;
use App\Core\Support\Concerns\File\HasPreviewable;
use App\Core\Support\Concerns\File\HasResponsiveImages;
use App\Core\Support\Concerns\File\HasTemporaryUrls;
use App\Core\Support\Concerns\File\HasVisibility;
use App\Core\Support\Concerns\HasReorderable;

abstract class FileInputBaseSchema extends BaseInputSchema
{
    use HasAcceptedFileTypes;
    use HasDirectory;
    use HasDisk;
    use HasDownloadable;
    use HasMaxFiles;
    use HasMaxSize;
    use HasMinSize;
    use HasMultiple;
    use HasOpenable;
    use HasPreserveFilenames;
    use HasPreviewable;
    use HasReorderable;
    use HasVisibility;
    use HasCollection;
    use HasConversions;
    use HasResponsiveImages;
    use HasTemporaryUrls;
    use HasImageEditor;
    use HasOptimize;
}
