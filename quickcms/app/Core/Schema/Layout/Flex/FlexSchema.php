<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Flex;

use App\Core\Schema\Layout\LayoutSchema;
use App\Core\Support\Concerns\HasAlign;
use App\Core\Support\Concerns\HasDirection;
use App\Core\Support\Concerns\HasGap;
use App\Core\Support\Concerns\HasJustify;
use App\Core\Support\Concerns\HasWrap;

final class FlexSchema extends LayoutSchema
{
    use HasAlign;
    use HasDirection;
    use HasGap;
    use HasJustify;
    use HasWrap;
}
