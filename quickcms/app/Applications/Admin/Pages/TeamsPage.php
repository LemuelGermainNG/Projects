<?php

declare(strict_types=1);

namespace App\Applications\Admin\Pages;

use App\Core\Page\Contracts\Page;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Container\ContainerSchema;
use App\Core\Schema\Page\PageSchema;

final class TeamsPage implements Page
{
    public function id(): string
    {
        return 'teams';
    }

    public function content(): PageSchema
    {
        return PageSchema::make()
            ->header(
                HeaderSchema::make()
                    ->title('Teams')
                    ->description('Manage teams and team memberships.'),
            )
            ->content(
                ContainerSchema::make(),
            );
    }

    /**
     * @return array<string, mixed>
     */
    public function metadata(): array
    {
        return [
            'title' => 'Teams',
        ];
    }
}
