<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Accordion;

use App\Core\Schema\Layout\SingleChildLayoutSchema;
use App\Core\Support\Concerns\HasDisabled;
use App\Core\Support\Concerns\HasVisible;

final class AccordionItemSchema extends SingleChildLayoutSchema
{
    use HasVisible;
    use HasDisabled;
}
