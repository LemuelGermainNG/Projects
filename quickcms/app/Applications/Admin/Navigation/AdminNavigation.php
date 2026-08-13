<?php

declare(strict_types=1);

namespace App\Applications\Admin\Navigation;

use App\Applications\Admin\Pages\DashboardPage;
use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Support\Enum\Icons\Heroicons;

final class AdminNavigation implements Navigation
{
    public function schema(): NavigationSchema
    {
        return NavigationSchema::make()
            ->items([
                NavigationItemSchema::make()
                    ->label('Dashboard')
                    ->icon(Heroicons::Home)
                    ->route('dashboard'),
            ]);
    }

    /**
     * @return array<string, class-string>
     */
    public function pages(): array
    {
        return [
            'dashboard' => DashboardPage::class,
        ];
    }

    public function metadata(): array
    {
        return [
            'title' => 'Administration',
        ];
    }
}
