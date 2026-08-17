<?php

declare(strict_types=1);

namespace App\Features\User\Pages;

use App\Core\Page\Contracts\Page;
use App\Core\Schema\Action\Actions\EditAction;
use App\Core\Schema\Element\Badge\BadgeSchema;
use App\Core\Schema\Element\Text\TextSchema;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Infolist\Entry\EntrySchema;
use App\Core\Schema\Infolist\InfolistSchema;
use App\Core\Schema\Layout\Card\CardSchema;
use App\Core\Schema\Page\PageSchema;

final class UserViewPage implements Page
{
    public function id(): string
    {
        return 'users/{id}';
    }

    public function content(): PageSchema
    {
        return PageSchema::make()
            ->header(
                HeaderSchema::make()
                    ->title('User')
                    ->description('View application user details.'),
            )
            ->content(
                CardSchema::make()
                    ->child(
                        InfolistSchema::make()
                            ->source('user')
                            ->schema([
                                EntrySchema::make()
                                    ->label('Name')
                                    ->child(
                                        TextSchema::make()
                                            ->value(''),
                                    ),

                                EntrySchema::make()
                                    ->label('Email')
                                    ->child(
                                        TextSchema::make()
                                            ->value(''),
                                    ),

                                EntrySchema::make()
                                    ->label('Status')
                                    ->child(
                                        BadgeSchema::make()
                                            ->value(''),
                                    ),
                            ]),
                    ),
            );
    }

    public function metadata(): array
    {
        return [
            'title' => 'User',
            'description' => 'View application user details.',
        ];
    }
}
