<?php

declare(strict_types=1);

namespace Tests\Support\Pages;

use App\Core\Page\Contracts\Page;
use App\Core\Schema\Page\PageSchema;

final class DynamicPage implements Page
{
    public function id(): string
    {
        return 'users';
    }

    public function content(): PageSchema
    {
        return PageSchema::make();
    }

    public function metadata(): array
    {
        return ['title' => 'User'];
    }
}
