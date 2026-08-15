<?php

declare(strict_types=1);

use App\Core\Support\Enum\Icons\Heroicons;
use App\Features\User\Navigation\UserNavigation;
use App\Features\User\Pages\UsersPage;

it('builds the user navigation', function (): void {
    $navigation = new UserNavigation;

    $schema = $navigation->schema();

    expect($schema->items())
        ->toHaveCount(1);

    expect($schema->groups())
        ->toBe([]);
});

it('contains the users entry', function (): void {
    $item = (new UserNavigation)
        ->schema()
        ->items()[0];

    expect($item->label())
        ->toBe('Users');

    expect($item->icon())
        ->toBe(Heroicons::User);

    expect($item->route())
        ->toBe('users');
});

it('resolves the users page route', function (): void {
    expect((new UserNavigation)->pages())
        ->toMatchArray([
            'users' => UsersPage::class,
        ]);
});
