<?php

declare(strict_types=1);

namespace App\Core\Support\Enums\Icons;

use App\Core\Support\Contracts\IconInterface;

enum Heroicons: string implements IconInterface
{
    case User = 'heroicon-o-user';
    case Users = 'heroicon-o-users';

    case Pencil = 'heroicon-o-pencil';
    case Trash = 'heroicon-o-trash';

    case Plus = 'heroicon-o-plus';
    case Minus = 'heroicon-o-minus';

    case Home = 'heroicon-o-home';
    case Cog = 'heroicon-o-cog';
    case Bell = 'heroicon-o-bell';
    case ChartBar = 'heroicon-o-chart-bar';

    public function value(): string
    {
        return $this->value;
    }
}
