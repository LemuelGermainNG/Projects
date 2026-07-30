<?php

declare(strict_types=1);

namespace App\Core\Support\Enums;

enum Visibility: string
{
    case Visible = 'visible';

    case Hidden = 'hidden';

    case Collapsed = 'collapsed';
}
