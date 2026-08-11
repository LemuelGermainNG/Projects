<?php

declare(strict_types=1);

namespace App\Applications\Admin\Navigation;

use App\Applications\Admin\Pages\DashboardPage;
use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;

final class AdminNavigation implements Navigation
{
    public function schema(): NavigationSchema
    {
        return NavigationSchema::make()
            ->label('Administration')
            ->icon('heroicon-o-squares-2x2')
            ->items([
                NavigationItemSchema::make()
                    ->label('Dashboard')
                    ->icon('heroicon-o-home')
                    ->route(
                        DashboardPage::class,
                    ),

                NavigationItemSchema::make()
                    ->label('Settings')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->route('admin.settings'),

                NavigationItemSchema::make()
                    ->label('Plugins')
                    ->icon('heroicon-o-puzzle-piece')
                    ->route('admin.plugins'),

                NavigationItemSchema::make()
                    ->label('System')
                    ->icon('heroicon-o-server')
                    ->route('admin.system'),
            ]);
    }

    public function metadata(): array
    {
        return [
            'title' => 'Administration',
        ];
    }
}
