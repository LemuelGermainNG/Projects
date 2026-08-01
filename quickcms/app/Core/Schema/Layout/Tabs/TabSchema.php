<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Tabs;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasChild;
use App\Core\Support\Concerns\HasDisabled;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasLabel;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasVisible;

final class TabSchema extends Schema
{
    use HasLabel;

    use HasIcon;

    use HasChild;

    use HasVisible;

    use HasDisabled;

    use HasProps;
}
