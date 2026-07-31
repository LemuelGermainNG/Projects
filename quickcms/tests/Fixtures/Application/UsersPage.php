<?php

declare(strict_types=1);

namespace Tests\Fixtures\Application;

use App\Core\Runtime\Contracts\Page;
use App\Core\Schema\Layout\Container\ContainerSchema;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Page\PageSchema;

final class UsersPage implements Page
{
    public function id(): string
    {
        return 'users';
    }

    public function content(): PageSchema
    {
        return PageSchema::make()
            ->header(
                HeaderSchema::make()
                    ->title('Users')
                    ->description('Manage application users.')
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
