<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Image;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasAlt;
use App\Core\Support\Concerns\HasHeight;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasUrl;
use App\Core\Support\Concerns\HasWidth;

final class ImageSchema extends Schema
{
    use HasAlt;
    use HasHeight;
    use HasProps;
    use HasUrl;
    use HasWidth;
}
