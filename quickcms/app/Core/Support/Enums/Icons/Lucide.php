<?php

declare(strict_types=1);

namespace App\Core\Support\Enums\Icons;

use App\Core\Support\Contracts\IconInterface;

enum Lucide: string implements IconInterface
{
    case User = 'lucide-user';
    case Users = 'lucide-users';

    case Pencil = 'lucide-pencil';
    case Trash = 'lucide-trash';

    case Home = 'lucide-house';

    public function value(): string
    {
        return $this->value;
    }
}
