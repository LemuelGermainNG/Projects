<?php

declare(strict_types=1);

namespace Tests\Fixtures\Navigation;

use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Support\Enums\Icons\Heroicons;
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
                    ->route(DashboardPage::class),

                NavigationItemSchema::make()
                    ->label('Management')
                    ->icon(Heroicons::Users)
                    ->children([
                        NavigationItemSchema::make()
                            ->label('Users')
                            ->icon(Heroicons::User)
                            ->route(UsersPage::class),
                    ]),
            ]);
    }

    public function metadata(): array
    {
        return [
            'version' => '1.0',
        ];
    }
}
