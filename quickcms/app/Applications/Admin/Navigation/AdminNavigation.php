<?php

declare(strict_types=1);

namespace App\Applications\Admin\Navigation;

use App\Applications\Admin\Pages\CategoriesPage;
use App\Applications\Admin\Pages\DashboardPage;
use App\Applications\Admin\Pages\LogsPage;
use App\Applications\Admin\Pages\MediaPage;
use App\Applications\Admin\Pages\PluginsPage;
use App\Applications\Admin\Pages\PostsPage;
use App\Applications\Admin\Pages\RolesPage;
use App\Applications\Admin\Pages\SettingsPage;
use App\Applications\Admin\Pages\TeamsPage;
use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationGroupSchema;
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
                    ->route('dashboard')
                    ->sort(10),
            ])
            ->groups([
                NavigationGroupSchema::make()
                    ->id('management')
                    ->label('Management')
                    ->icon(Heroicons::Users)
                    ->sort(20)
                    ->items([
                        NavigationItemSchema::make()
                            ->label('Teams')
                            ->icon(Heroicons::UserGroup)
                            ->route('teams.index')
                            ->sort(20),

                        NavigationItemSchema::make()
                            ->label('Roles')
                            ->icon(Heroicons::ShieldCheck)
                            ->route('roles.index')
                            ->sort(30),
                    ]),

                NavigationGroupSchema::make()
                    ->id('content')
                    ->label('Content')
                    ->icon(Heroicons::DocumentText)
                    ->sort(30)
                    ->items([
                        NavigationItemSchema::make()
                            ->label('Posts')
                            ->icon(Heroicons::Document)
                            ->route('posts.index')
                            ->sort(10),

                        NavigationItemSchema::make()
                            ->label('Media')
                            ->icon(Heroicons::Photo)
                            ->route('media.index')
                            ->sort(20),

                        NavigationItemSchema::make()
                            ->label('Categories')
                            ->icon(Heroicons::Tag)
                            ->route('categories.index')
                            ->sort(30),
                    ]),

                NavigationGroupSchema::make()
                    ->id('system')
                    ->label('System')
                    ->icon(Heroicons::Cog)
                    ->sort(40)
                    ->items([
                        NavigationItemSchema::make()
                            ->label('Settings')
                            ->icon(Heroicons::AdjustmentsHorizontal)
                            ->route('settings.index')
                            ->sort(10),

                        NavigationItemSchema::make()
                            ->label('Plugins')
                            ->icon(Heroicons::PuzzlePiece)
                            ->route('plugins.index')
                            ->sort(20),

                        NavigationItemSchema::make()
                            ->label('Logs')
                            ->icon(Heroicons::DocumentMagnifyingGlass)
                            ->route('logs.index')
                            ->sort(30),
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
            'teams.index' => TeamsPage::class,
            'roles.index' => RolesPage::class,
            'posts.index' => PostsPage::class,
            'media.index' => MediaPage::class,
            'categories.index' => CategoriesPage::class,
            'settings.index' => SettingsPage::class,
            'plugins.index' => PluginsPage::class,
            'logs.index' => LogsPage::class,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function metadata(): array
    {
        return [
            'title' => 'Administration',
        ];
    }
}
