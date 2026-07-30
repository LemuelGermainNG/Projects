<?php

declare(strict_types=1);

namespace Tests\Fixtures\Application;

use App\Core\Runtime\Contracts\Page;
use App\Core\Schema\Container\ContainerSchema;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Page\PageSchema;

final class DashboardPage implements Page
{
    public function id(): string
    {
        return 'dashboard';
    }

    public function content(): PageSchema
    {
        return PageSchema::make()
            ->header(
                HeaderSchema::make()
                    ->title('Dashboard')
            )
            ->content(
                ContainerSchema::make()
            );
    }

    public function metadata(): array
    {
        return [];
    }
}
