<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Avatar;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasAlt;
use App\Core\Support\Concerns\HasName;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasUrl;

final class AvatarSchema extends Schema
{
    use HasAlt;
    use HasName;
    use HasProps;
    use HasUrl;
}
