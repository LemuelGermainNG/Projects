<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Repeater;

use App\Core\Schema\Form\Base\BaseInputSchema;
use App\Core\Support\Concerns\HasReorderable;
use App\Core\Support\Concerns\HasSchema;
use App\Core\Support\Concerns\Repeater\HasCloneable;
use App\Core\Support\Concerns\Repeater\HasCollapsible;
use App\Core\Support\Concerns\Repeater\HasDefaultItems;
use App\Core\Support\Concerns\Repeater\HasItemLabel;
use App\Core\Support\Concerns\Repeater\HasLayout;
use App\Core\Support\Concerns\Repeater\HasMaxItems;
use App\Core\Support\Concerns\Repeater\HasMinItems;

final class RepeaterSchema extends BaseInputSchema
{
    use HasCloneable;
    use HasCollapsible;
    use HasDefaultItems;
    use HasItemLabel;
    use HasLayout;
    use HasMaxItems;
    use HasMinItems;
    use HasReorderable;
    use HasSchema;
}
