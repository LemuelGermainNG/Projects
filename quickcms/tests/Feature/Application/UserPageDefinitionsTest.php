<?php

declare(strict_types=1);

use App\Features\User\Navigation\UserNavigation;
use App\Features\User\Pages\UserCreatePage;
use App\Features\User\Pages\UserEditPage;
use App\Features\User\Pages\UserViewPage;
use App\Features\User\Pages\UsersPage;

it('registers the user page routes', function (): void {
    expect((new UserNavigation())->pages())->toBe([
        'users' => UsersPage::class,
        'users/create' => UserCreatePage::class,
        'users/{id}' => UserViewPage::class,
        'users/{id}/edit' => UserEditPage::class,
    ]);
});

it('defines the expected dynamic page identifiers', function (): void {
    expect((new UserCreatePage())->id())->toBe('users/create');
    expect((new UserViewPage())->id())->toBe('users/{id}');
    expect((new UserEditPage())->id())->toBe('users/{id}/edit');
});
