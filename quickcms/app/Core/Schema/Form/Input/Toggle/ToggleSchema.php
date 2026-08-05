<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Toggle;

use App\Core\Schema\Form\Base\BooleanInputBaseSchema;
use App\Core\Support\Concerns\HasOffColor;
use App\Core\Support\Concerns\HasOffIcon;
use App\Core\Support\Concerns\HasOnColor;
use App\Core\Support\Concerns\HasOnIcon;

final class ToggleSchema extends BooleanInputBaseSchema
{
    use HasOnIcon;
    use HasOffIcon;

    use HasOnColor;
    use HasOffColor;
}
