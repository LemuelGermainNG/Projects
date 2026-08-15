<?php

declare(strict_types=1);

namespace App\Applications\Admin\Pages;

use App\Core\Runtime\Contracts\Page;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Container\ContainerSchema;
use App\Core\Schema\Page\PageSchema;

final class PostsPage implements Page
{
    public function id(): string
    {
        return 'posts';
    }

    public function content(): PageSchema
    {
        return PageSchema::make()
            ->header(
                HeaderSchema::make()
                    ->title('Posts')
                    ->description('Manage application posts and content.'),
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
            'title' => 'Posts',
        ];
    }
}
