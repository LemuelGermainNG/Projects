<?php

declare(strict_types=1);

namespace Tests\Fixtures\Pages;

use App\Core\Page\Contracts\Page;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Accordion\AccordionItemSchema;
use App\Core\Schema\Layout\Accordion\AccordionSchema;
use App\Core\Schema\Layout\Card\CardSchema;
use App\Core\Schema\Layout\Grid\GridItemSchema;
use App\Core\Schema\Layout\Grid\GridSchema;
use App\Core\Schema\Layout\Stack\StackSchema;
use App\Core\Schema\Layout\Tabs\TabSchema;
use App\Core\Schema\Layout\Tabs\TabsSchema;
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
                    ->description('QuickCMS demonstration page'),
            )
            ->content(
                GridSchema::make()
                    ->columns(12)
                    ->gap(6)
                    ->children([
                        GridItemSchema::make()
                            ->span(8)
                            ->child(
                                CardSchema::make()
                                    ->header(
                                        HeaderSchema::make()
                                            ->title('Administration'),
                                    )
                                    ->child(
                                        TabsSchema::make()
                                            ->children([
                                                TabSchema::make()
                                                    ->label('Users')
                                                    ->child(
                                                        AccordionSchema::make()
                                                            ->children([
                                                                AccordionItemSchema::make()
                                                                    ->header(
                                                                        HeaderSchema::make()
                                                                            ->title('Active users')
                                                                            ->description('Currently active accounts'),
                                                                    )
                                                                    ->child(
                                                                        StackSchema::make()
                                                                            ->children([
                                                                                HeaderSchema::make()
                                                                                    ->title('Users table'),
                                                                            ]),
                                                                    ),

                                                                AccordionItemSchema::make()
                                                                    ->header(
                                                                        HeaderSchema::make()
                                                                            ->title('Archived users'),
                                                                    )
                                                                    ->child(
                                                                        StackSchema::make()
                                                                            ->children([
                                                                                HeaderSchema::make()
                                                                                    ->title('Archives'),
                                                                            ]),
                                                                    ),
                                                            ]),
                                                    ),

                                                TabSchema::make()
                                                    ->label('Roles')
                                                    ->child(
                                                        StackSchema::make()
                                                            ->children([
                                                                HeaderSchema::make()
                                                                    ->title('Roles management'),
                                                            ]),
                                                    ),
                                            ]),
                                    ),
                            ),

                        GridItemSchema::make()
                            ->span(4)
                            ->child(
                                CardSchema::make()
                                    ->header(
                                        HeaderSchema::make()
                                            ->title('Statistics'),
                                    )
                                    ->child(
                                        StackSchema::make()
                                            ->children([
                                                HeaderSchema::make()
                                                    ->title('Users')
                                                    ->description('1,245'),

                                                HeaderSchema::make()
                                                    ->title('Roles')
                                                    ->description('12'),

                                                HeaderSchema::make()
                                                    ->title('Permissions')
                                                    ->description('56'),
                                            ]),
                                    ),
                            ),
                    ]),
            );
    }

    public function metadata(): array
    {
        return [];
    }
}
