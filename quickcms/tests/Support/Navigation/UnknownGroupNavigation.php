<?php

declare(strict_types=1);

namespace Tests\Support\Navigation;

use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;

final class UnknownGroupNavigation implements Navigation
{
    public function schema(): NavigationSchema
    {
        return NavigationSchema::make()
            ->items([
                NavigationItemSchema::make()
                    ->group('unknown')
                    ->label('Unknown')
                    ->route('unknown'),
            ]);
    }

    public function pages(): array
    {
        return [];
    }

    public function metadata(): array
    {
        return [];
    }
}
