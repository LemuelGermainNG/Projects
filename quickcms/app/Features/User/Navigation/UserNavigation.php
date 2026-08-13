<?php

declare(strict_types=1);

namespace App\Features\User\Navigation;

use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Support\Enum\Icons\Heroicons;
use App\Features\User\Pages\UsersPage;

final class UserNavigation implements Navigation
{
    public function schema(): NavigationSchema
    {
        return NavigationSchema::make()
            ->items([
                NavigationItemSchema::make()
                    ->label('Users')
                    ->icon(Heroicons::User)
                    ->route('users.index'),
            ]);
    }

    /**
     * @return array<string, class-string>
     */
    public function pages(): array
    {
        return [
            'users.index' => UsersPage::class,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function metadata(): array
    {
        return [
            'title' => 'Users',
        ];
    }
}
