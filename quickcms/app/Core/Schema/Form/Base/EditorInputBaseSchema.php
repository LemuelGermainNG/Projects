<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Support\Concerns\Editor\HasAutosave;
use App\Core\Support\Concerns\Editor\HasMaxHeight;
use App\Core\Support\Concerns\Editor\HasMentions;
use App\Core\Support\Concerns\Editor\HasMinHeight;
use App\Core\Support\Concerns\Editor\HasPreview;
use App\Core\Support\Concerns\Editor\HasReadonlyMode;
use App\Core\Support\Concerns\Editor\HasToolbar;
use App\Core\Support\Concerns\Editor\HasUpload;

abstract class EditorInputBaseSchema extends TextInputBaseSchema
{
    use HasAutosave;
    use HasMaxHeight;
    use HasMentions;
    use HasMinHeight;
    use HasPreview;
    use HasReadonlyMode;
    use HasToolbar;
    use HasUpload;
}
