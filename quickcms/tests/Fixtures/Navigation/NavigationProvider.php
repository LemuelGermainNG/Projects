<?php

declare(strict_types=1);

namespace Tests\Fixtures\Navigation;

use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Support\Enum\Icons\Heroicons;
use Tests\Fixtures\Pages\DashboardPage;
use Tests\Fixtures\Pages\UsersPage;

final class NavigationProvider implements Navigation
{
    public function schema(): NavigationSchema
    {
        return NavigationSchema::make()
            ->items([
                NavigationItemSchema::make()
                    ->label('Dashboard')
                    ->icon(Heroicons::Home)
                    ->route('dashboard'),

                NavigationItemSchema::make()
                    ->label('Management')
                    ->icon(Heroicons::Users)
                    ->children([
                        NavigationItemSchema::make()
                            ->label('Users')
                            ->icon(Heroicons::User)
                            ->route('users'),
                    ]),
            ]);
    }

    /**
     * @return array<string, class-string>
     */
    public function pages(): array
    {
        return [
            'dashboard' => DashboardPage::class,
            'users' => UsersPage::class,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function metadata(): array
    {
        return [
            'version' => '1.0',
        ];
    }
}
