<?php

declare(strict_types=1);

namespace Tests\Support\Pages;

use App\Core\Runtime\Contracts\Page;
use App\Core\Schema\Page\PageSchema;

final class DynamicEditPage implements Page
{
    public function id(): string
    {
        return 'users/{id}/edit';
    }

    public function content(): PageSchema
    {
        return PageSchema::make();
    }

    public function metadata(): array
    {
        return ['title' => 'Edit User'];
    }
}
