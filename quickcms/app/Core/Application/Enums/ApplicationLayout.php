<?php

declare(strict_types=1);

namespace App\Core\Application\Enums;

enum ApplicationLayout: string
{
    case Sidebar = 'sidebar';

    case TopNavigation = 'top-navigation';

    case Split = 'split';

    case Simple = 'simple';
}
