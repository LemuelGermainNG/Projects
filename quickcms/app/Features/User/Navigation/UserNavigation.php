<?php

declare(strict_types=1);

namespace App\Features\User\Navigation;

use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Support\Enum\Icons\Heroicons;
use App\Features\User\Pages\UserCreatePage;
use App\Features\User\Pages\UserEditPage;
use App\Features\User\Pages\UserViewPage;
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
                    ->route('users')
                    ->sort(50),
            ]);
    }

    /**
     * @return array<string, class-string>
     */
    public function pages(): array
    {
        return [
            'users' => UsersPage::class,
            'users/create' => UserCreatePage::class,
            'users/{id}' => UserViewPage::class,
            'users/{id}/edit' => UserEditPage::class,
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
