<?php

declare(strict_types=1);

namespace Tests\Support\Pages;

use App\Core\Page\Contracts\Page;
use App\Core\Schema\Page\PageSchema;

final class DynamicCreatePage implements Page
{
    public function id(): string
    {
        return 'users/create';
    }

    public function content(): PageSchema
    {
        return PageSchema::make();
    }

    public function metadata(): array
    {
        return ['title' => 'Create User'];
    }
}
