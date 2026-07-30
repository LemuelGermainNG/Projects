<?php

declare(strict_types=1);

namespace App\Core\Support\Enums\Icons;

use App\Core\Support\Contracts\IconInterface;

enum FontAwesome: string implements IconInterface
{
    case User = 'fa-user';
    case Users = 'fa-users';

    case Pencil = 'fa-pencil';
    case Trash = 'fa-trash';

    case Home = 'fa-home';
    case Cog = 'fa-cog';

    public function value(): string
    {
        return $this->value;
    }
}
