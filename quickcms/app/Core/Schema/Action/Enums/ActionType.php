<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Enums;

enum ActionType: string
{
    case Button = 'button';

    case Link = 'link';

    case IconButton = 'icon-button';
}
