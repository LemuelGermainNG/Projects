<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Option;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasBadge;
use App\Core\Support\Concerns\HasDescription;
use App\Core\Support\Concerns\HasDisabled;
use App\Core\Support\Concerns\HasGroup;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasImage;
use App\Core\Support\Concerns\HasLabel;
use App\Core\Support\Concerns\HasMetadata;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasValue;

final class OptionSchema extends Schema
{
    use HasBadge;
    use HasDescription;
    use HasDisabled;
    use HasGroup;
    use HasIcon;
    use HasImage;
    use HasLabel;
    use HasMetadata;
    use HasProps;
    use HasValue;
}
