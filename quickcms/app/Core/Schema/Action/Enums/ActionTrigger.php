<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Enums;

enum ActionTrigger: string
{
    case Request = 'request';

    case Modal = 'modal';

    case Url = 'url';

    case Event = 'event';
}
