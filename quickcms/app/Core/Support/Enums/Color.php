<?php

declare(strict_types=1);

namespace App\Core\Support\Enums;

enum Color: string
{
    case Primary = 'primary';

    case Secondary = 'secondary';

    case Success = 'success';

    case Warning = 'warning';

    case Danger = 'danger';

    case Info = 'info';

    case Gray = 'gray';

    case Light = 'light';

    case Dark = 'dark';
}
