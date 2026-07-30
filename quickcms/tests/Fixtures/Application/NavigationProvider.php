<?php

declare(strict_types=1);

namespace Tests\Fixtures\Application;

use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;

final class NavigationProvider implements Navigation
{
    public function schema(): NavigationSchema
    {
        return NavigationSchema::make()
            ->label('Administration')
            ->items([
                NavigationItemSchema::make()
                    ->label('Dashboard')
                    ->route('dashboard'),

                NavigationItemSchema::make()
                    ->label('Users')
                    ->route('users'),
            ]);
    }

    public function metadata(): array
    {
        return [];
    }
}
