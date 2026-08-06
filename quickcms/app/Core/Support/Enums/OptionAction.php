<?php

declare(strict_types=1);

namespace App\Core\Support\Enums;

enum OptionAction: string
{
    case Create = 'create';

    case Edit = 'edit';

    case View = 'view';

    case Delete = 'delete';

    case Duplicate = 'duplicate';

    case Restore = 'restore';

    case Archive = 'archive';
}
