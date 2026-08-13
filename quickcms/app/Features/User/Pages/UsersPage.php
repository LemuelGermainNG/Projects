<?php

declare(strict_types=1);

namespace App\Features\User\Pages;

use App\Core\Runtime\Contracts\Page;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Page\PageSchema;
use App\Core\Schema\Widget\Table\TableWidgetSchema;
use App\Features\User\Sources\UserSource;

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
                    ->description(
                        'Manage application users',
                    ),
            )
            ->content(
                TableWidgetSchema::make()
                    ->key('users')
                    ->title('Users')
                    ->source(
                        UserSource::class,
                    )
                    ->tableColumns([
                        [
                            'key' => 'name',
                            'label' => 'Name',
                            'sortable' => true,
                            'searchable' => true,
                            'width' => 240,
                        ],
                        [
                            'key' => 'email',
                            'label' => 'Email',
                            'searchable' => true,
                        ],
                        [
                            'key' => 'status',
                            'label' => 'Status',
                            'format' => 'badge',
                        ],
                    ])
                    ->rowKey('id'),
            );
    }

    public function metadata(): array
    {
        return [
            'title' => 'Users',
        ];
    }
}
