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
            ->label('Administration')
            ->icon(Heroicons::Squares2x2)
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

    public function pages(): array
    {
        return [
            DashboardPage::class,
            UsersPage::class,
        ];
    }

    public function metadata(): array
    {
        return [
            'version' => '1.0',
        ];
    }
}
