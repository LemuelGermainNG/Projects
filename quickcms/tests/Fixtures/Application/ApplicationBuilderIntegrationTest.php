<?php

declare(strict_types=1);

use App\Core\Application\Application;
use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Layout\Accordion\AccordionSchema;
use App\Core\Schema\Layout\Card\CardSchema;
use App\Core\Schema\Layout\Grid\GridSchema;
use App\Core\Schema\Layout\Tabs\TabsSchema;
use Tests\Fixtures\Navigation\NavigationProvider;
use Tests\Fixtures\Pages\DashboardPage;
use Tests\Fixtures\Pages\UsersPage;

it('builds a complete application schema', function (): void {
    Application::make()
        ->id('admin')
        ->name('Administration')
        ->path('/admin')
        ->pages(
            DashboardPage::class,
            UsersPage::class,
        )
        ->navigation(
            NavigationProvider::class,
        );

    $application = Application::find('admin');

    expect($application)
        ->not->toBeNull();

    $schema = Application::build(
        $application,
        ApplicationSchema::make(),
    );

    expect($schema)
        ->toBeInstanceOf(ApplicationSchema::class);

    expect($schema->pages())
        ->toHaveCount(2);

    expect($schema->navigation())
        ->toHaveCount(1);
});

it('builds dashboard page', function (): void {
    $application = Application::find('admin');

    $schema = Application::build(
        $application,
        ApplicationSchema::make(),
    );

    $dashboard = $schema->pages()[0];

    expect($dashboard->header())
        ->not->toBeNull();

    expect($dashboard->header()?->title())
        ->toBe('Dashboard');

    expect($dashboard->content())
        ->toBeInstanceOf(GridSchema::class);
});

it('builds dashboard layouts', function (): void {
    $application = Application::find('admin');

    $schema = Application::build(
        $application,
        ApplicationSchema::make(),
    );

    /** @var GridSchema $grid */
    $grid = $schema->pages()[0]->content();

    expect($grid->children())
        ->toHaveCount(2);

    $firstCard = $grid->children()[0]->child();

    expect($firstCard)
        ->toBeInstanceOf(CardSchema::class);

    /** @var CardSchema $firstCard */
    $tabs = $firstCard->child();

    expect($tabs)
        ->toBeInstanceOf(TabsSchema::class);

    /** @var TabsSchema $tabs */
    expect($tabs->tabs())
        ->toHaveCount(2);

    $accordion = $tabs->tabs()[0]->child();

    expect($accordion)
        ->toBeInstanceOf(AccordionSchema::class);

    /** @var AccordionSchema $accordion */
    expect($accordion->items())
        ->toHaveCount(2);
});

it('builds navigation schema', function (): void {
    $application = Application::find('admin');

    $schema = Application::build(
        $application,
        ApplicationSchema::make(),
    );

    $navigation = $schema->navigation()[0];

    expect($navigation->label())
        ->toBe('Administration');

    expect($navigation->items())
        ->toHaveCount(2);

    expect($navigation->items()[0]->label())
        ->toBe('Dashboard');

    expect($navigation->items()[1]->label())
        ->toBe('Management');

    expect($navigation->items()[1]->children())
        ->toHaveCount(1);

    expect($navigation->items()[1]->children()[0]->label())
        ->toBe('Users');
});
