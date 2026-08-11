<?php

declare(strict_types=1);

namespace App\Features\User\Navigation;

use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;

final class UserNavigation implements Navigation
{
    public function schema(): NavigationSchema
    {
        return NavigationSchema::make()
            ->label('Users')
            ->icon('heroicon-o-users')
            ->items([
                NavigationItemSchema::make()
                    ->label('Users')
                    ->icon('heroicon-o-user')
                    ->route('users.index'),
            ]);
    }

    public function metadata(): array
    {
        return [
            'title' => 'Users',
        ];
    }
}
