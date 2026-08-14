<?php

declare(strict_types=1);

namespace Tests\Support\Navigation;

use App\Core\Runtime\Contracts\Navigation;
use App\Core\Schema\Navigation\NavigationSchema;
use Tests\Support\Pages\DynamicPage;
use Tests\Support\Pages\DynamicEditPage;
use Tests\Support\Pages\DynamicCreatePage;

final class DynamicNavigation implements Navigation
{
    public function schema(): NavigationSchema
    {
        return NavigationSchema::make();
    }

    /**
     * @return array<string, class-string>
     */
    public function pages(): array
    {
        return [
            'users' => DynamicPage::class,
            'users/create' => DynamicCreatePage::class,
            'users/{id}' => DynamicPage::class,
            'users/{id}/edit' => DynamicEditPage::class,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function metadata(): array
    {
        return [];
    }
}
