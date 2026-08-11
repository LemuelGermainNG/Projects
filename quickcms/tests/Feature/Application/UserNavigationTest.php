<?php

declare(strict_types=1);

use App\Features\User\Navigation\UserNavigation;

it('builds the user navigation', function (): void {
    $navigation = new UserNavigation();

    $schema = $navigation->schema();

    expect($schema->label())
        ->toBe('Users');

    expect($schema->icon())
        ->toBe('heroicon-o-users');

    expect($schema->items())
        ->toHaveCount(1);
});

it('contains the users entry', function (): void {
    $item = (new UserNavigation())
        ->schema()
        ->items()[0];

    expect($item->label())
        ->toBe('Users');

    expect($item->route())
        ->toBe('users.index');
});
