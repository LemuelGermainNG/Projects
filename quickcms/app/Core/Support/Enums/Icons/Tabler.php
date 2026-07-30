<?php

declare(strict_types=1);

namespace App\Core\Support\Enums\Icons;

use App\Core\Support\Contracts\IconInterface;

enum Tabler: string implements IconInterface
{
    case User = 'tabler-user';
    case Users = 'tabler-users';

    case Pencil = 'tabler-pencil';
    case Trash = 'tabler-trash';

    case Home = 'tabler-home';

    public function value(): string
    {
        return $this->value;
    }
}
