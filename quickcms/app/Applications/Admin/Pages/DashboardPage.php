<?php

declare(strict_types=1);

namespace App\Applications\Admin\Pages;

use App\Core\Runtime\Contracts\Page;
use App\Core\Schema\Dashboard\DashboardSchema;
use App\Core\Schema\Dashboard\Layout\DashboardColumnSchema;
use App\Core\Schema\Dashboard\Layout\DashboardLayoutSchema;
use App\Core\Schema\Dashboard\Layout\DashboardRowSchema;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Page\PageSchema;
use App\Core\Schema\Widget\Card\CardWidgetSchema;
use App\Core\Schema\Widget\Chart\ChartWidgetSchema;
use App\Core\Schema\Widget\List\ListWidgetSchema;
use App\Core\Schema\Widget\Stats\StatsWidgetSchema;
use App\Core\Schema\Widget\Table\TableWidgetSchema;
use App\Features\User\Sources\UserSource;

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
                    ->description(
                        'Administration dashboard',
                    ),
            )
            ->content(
                DashboardSchema::make()
                    ->title('Dashboard')
                    ->description(
                        'Administration dashboard',
                    )
                    ->layout(
                        DashboardLayoutSchema::make()
                            ->columns(12)
                            ->gap(6)
                            ->rows([
                                /*
                                 * KPI row
                                 */
                                DashboardRowSchema::make()
                                    ->gap(6)
                                    ->columns([
                                        DashboardColumnSchema::make()
                                            ->width([
                                                'default' => 12,
                                                'md' => 6,
                                                'lg' => 3,
                                            ])
                                            ->widget(
                                                StatsWidgetSchema::make()
                                                    ->key('users')
                                                    ->title('Users')
                                                    ->value(1245)
                                                    ->trend(12.5),
                                            ),

                                        DashboardColumnSchema::make()
                                            ->width([
                                                'default' => 12,
                                                'md' => 6,
                                                'lg' => 3,
                                            ])
                                            ->widget(
                                                StatsWidgetSchema::make()
                                                    ->key('orders')
                                                    ->title('Orders')
                                                    ->value(328)
                                                    ->trend(8.2),
                                            ),

                                        DashboardColumnSchema::make()
                                            ->width([
                                                'default' => 12,
                                                'md' => 6,
                                                'lg' => 3,
                                            ])
                                            ->widget(
                                                StatsWidgetSchema::make()
                                                    ->key('revenue')
                                                    ->title('Revenue')
                                                    ->value('$48,240')
                                                    ->trend(15.8),
                                            ),

                                        DashboardColumnSchema::make()
                                            ->width([
                                                'default' => 12,
                                                'md' => 6,
                                                'lg' => 3,
                                            ])
                                            ->widget(
                                                CardWidgetSchema::make()
                                                    ->key('system')
                                                    ->title('System')
                                                    ->description(
                                                        'All systems operational',
                                                    ),
                                            ),
                                    ]),

                                /*
                                 * Analytics row
                                 */
                                DashboardRowSchema::make()
                                    ->gap(6)
                                    ->columns([
                                        DashboardColumnSchema::make()
                                            ->width([
                                                'default' => 12,
                                                'lg' => 8,
                                            ])
                                            ->widget(
                                                ChartWidgetSchema::make()
                                                    ->key('sales')
                                                    ->title('Sales')
                                                    ->chartType('line')
                                                    ->labels([
                                                        'Jan',
                                                        'Feb',
                                                        'Mar',
                                                        'Apr',
                                                        'May',
                                                        'Jun',
                                                    ])
                                                    ->series([
                                                        [
                                                            'name' => 'Sales',
                                                            'data' => [
                                                                120,
                                                                180,
                                                                160,
                                                                240,
                                                                210,
                                                                300,
                                                            ],
                                                        ],
                                                    ]),
                                            ),

                                        DashboardColumnSchema::make()
                                            ->width([
                                                'default' => 12,
                                                'lg' => 4,
                                            ])
                                            ->widget(
                                                ListWidgetSchema::make()
                                                    ->key('activity')
                                                    ->title(
                                                        'Recent activity',
                                                    )
                                                    ->itemKey('id')
                                                    ->itemTitle('title')
                                                    ->itemDescription(
                                                        'description',
                                                    )
                                                    
                                                    ->items([
                                                        [
                                                            'id' => 1,
                                                            'title' => 'New user',
                                                            'description' =>
                                                                'John Doe registered',
                                                        ],
                                                        [
                                                            'id' => 2,
                                                            'title' =>
                                                                'Order created',
                                                            'description' =>
                                                                'Order #1024',
                                                        ],
                                                    ]),
                                            ),
                                    ]),

                                /*
                                 * User data
                                 */
                                DashboardRowSchema::make()
                                    ->gap(6)
                                    ->columns([
                                        DashboardColumnSchema::make()
                                            ->width([
                                                'default' => 12,
                                                'lg' => 8,
                                            ])
                                            ->widget(
                                                TableWidgetSchema::make()
                                                    ->key('latest-users')
                                                    ->title('Latest users')
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
                                            ),

                                        DashboardColumnSchema::make()
                                            ->width([
                                                'default' => 12,
                                                'lg' => 4,
                                            ])
                                            ->widget(
                                                CardWidgetSchema::make()
                                                    ->key('users-source')
                                                    ->title('Users')
                                                    ->description(
                                                        'Users provided by UserSource',
                                                    )
                                                    ->source(
                                                        UserSource::class,
                                                    ),
                                            ),
                                    ]),
                            ]),
                    ),
            );
    }

    public function metadata(): array
    {
        return [
            'title' => 'Dashboard',
            'description' => 'Administration dashboard',
        ];
    }
}
